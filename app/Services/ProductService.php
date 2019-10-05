<?php

namespace App\Services;

use App\Http\Helpers\Download;
use App\Http\Resources\CommentResource;
use App\Http\Resources\ProductResource;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;


class ProductService
{
    /**
     * @return LengthAwarePaginator
     */
    public function index(): LengthAwarePaginator
    {
        return Product::withCount('comments as count_comments')
            ->orderBy('created_at', 'desc')
            ->paginate();
    }

    /**
     * @param array $data
     * @return LengthAwarePaginator
     */
    public function filter(array $data): LengthAwarePaginator
    {
//        isset($data['search']);
        $search = (isset($data['search']))? $data['search']: '';
        $categories_id = $data['categories'];

        return Product::where('name', 'like', "%{$search}%")
            ->whereHas('category', function ($query) use ($categories_id) {
                if (isset($categories_id)) $query->whereIn('id', $categories_id);
            })
            ->withCount('comments as count_comments')
            ->orderBy('created_at', 'desc')
            ->paginate();
    }

    /**
     * @param  array  $data
     * @return Product
     */
    public function store(array $data): Product
    {
        $product = $data['product'];

        $product['image_1'] = Download::downloadFile($product['image_1']);
        $product['image_2'] = Download::downloadFile($product['image_2']);
        $product = Product::create($product);

        $comment = $data['comment'];
        $comment['product_id'] = $product->id;
        Comment::create($comment);

        return $product;
    }

    /**
     * @param  Product  $model
     * @return array
     */
    public function show(Product $model): array
    {
        $user_id = Auth::guard('api')->id();

        $model->load('comments');

        $check_rating = $model->comments()->where('user_id', $user_id)->first();
        $model->check_rating = isset($check_rating);

        $isset = true;
        foreach ($model->users as $user) {
            if ($user->id == $user_id) $isset = false;
        }

        if ($isset) $model->users()->attach($user_id);

        $comments = $model->comments()->orderBy('created_at', 'desc')->get();

        $data = ProductResource::make($model)->toArray(null);
        $data['comments'] = CommentResource::collection($comments);

        return $data;
    }

    /*
     * * @param  array  $data
     * * @param  Product  $model
     * * @return Product
     */
    public function update(array $data, Product $model): Product
    {
        $image_1 = $model->image_1;
        if (isset($data['image_1'])) $data['image_1'] = Download::downloadFile($data['image_1'], 'product', $image_1);

        $image_2 = $model->image_2;
        if (isset($data['image_2'])) $data['image_2'] = Download::downloadFile($data['image_2'], 'product', $image_2);

        $model->update($data);

        return $model;
    }

    /**
     * @param  Product  $model
     * @return Product
     * @throws /Exception
     */
    public function destroy(Product $model): Product
    {
        Download::deleteFile(Download::PRODUCT_PHOTO_DIRECTORY, $model->image_1);
        Download::deleteFile(Download::PRODUCT_PHOTO_DIRECTORY, $model->image_2);
        $model->delete();

        return $model;
    }
}
