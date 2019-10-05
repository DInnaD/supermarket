<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'string|max:40',
            'description' => 'string|max:5000',
            'weight' => 'numeric',
            'image_1' => 'filled|string',
            'image_2' => 'string',
            'category_id' => 'numeric',
        ];
    }
}
