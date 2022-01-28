<?php

namespace App\Http\Requests\Ad;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'userId' => 'required|numeric',
            'categoryId' => 'required|numeric',
            'subCategoryId' => 'required|numeric',
            'name' => 'required|string|min:3',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'images' => 'required',
            'location' => 'required'
        ];
    }
}
