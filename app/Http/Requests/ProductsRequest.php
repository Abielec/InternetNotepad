<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'ProductName' => 'required|max:255|unique:make_products',
            'Barcode' => 'integer|unique:make_products|nullable',
            'Calories' => 'required|numeric|min:0',
            'Carbohydrates' => 'required|numeric|min:0',
            'Fats' => 'required|numeric|min:0',
            'Roughages' => 'required|min:0|numeric',
            'Proteins' => 'required|numeric|min:0',
            'Vitamins' => 'nullable|max:255|string',
            'Description' => 'nullable',
            'Category' => 'required|integer',
        ];
    }
}
