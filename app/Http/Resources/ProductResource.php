<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'weight' => $this->weight,
            'image_1' => (isset($this->image_1)) ? $this->getImageUrl($this->image_1) : null,
            'image_2' => (isset($this->image_1)) ? $this->getImageUrl($this->image_2) : null,
            'min_price' => $this->comments()->min('price'),
            'max_price' => $this->comments()->max('price'),
            'rating' => round($this->comments()->avg('rating'), 1),
            'check_rating' => $this->check_rating,
            'comments' => $this->count_comments,
            'sub_category' => $this->category->title,
            'updated_at' => $this->updated_at->toDateTimeString(),
        ];
    }
}
