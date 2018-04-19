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
            'Barcode' => 'string|unique:make_products|nullable|size:6|regex:/^[0-9]+$/',
            'Calories' => 'required|numeric|min:0',
            'Carbohydrates' => 'required|numeric|min:0',
            'Fats' => 'required|numeric|min:0',
            'Roughages' => 'required|min:0|numeric',
            'Proteins' => 'required|numeric|min:0',
            'Vitamins' => 'nullable|max:255|string',
            'Description' => 'nullable',
            'Category' => 'required|integer|exists:categories,id|not_in:1',
        ];
    }
    public function messages(){
        return [
            'ProductName.required' => 'Pole z nazwą produktu jest wymagane',
            'ProductName.max' => 'Nazwa produktu zbyt długa',
            'ProductName.uniqe' => 'Nazwa produktu jest już w użyciu',
            'Barcode.integer' => 'Kod kreskowy musi być liczbą całkowitą',
            'Barcode.unique' => 'Dany kod kreskowy już jest wykorzystany',
            'Barcode.size' => 'Kod kresowy ma 6 cyfr',
            'Barcode.regex' => 'Kod kreskowy nie może zawierać liter',
            'Calories.required' => 'Pole z kaloriami jest wymagane',
            'Calories.numeric' => 'Pole z kaloriami musi być liczbą',
            'Calories.min' => 'Pole z kaloriami musi być większe bądź równe 0',
            'Carbohydrates.required' => 'Pole z węglowodanami jest wymagane',
            'Carbohydrates.numeric' => 'Pole z węglowodanami musi być liczbą',
            'Carbohydrates.min' => 'Pole z węglowodanami musi być większe bądź równe 0',
            'Fats.required' => 'Pole z tłuszczami jest wymagane',
            'Fats.numeric' => 'Pole z tłuszczami musi być liczbą',
            'Fats.min' => 'Pole z tłuszczami musi być większe bądź równe 0',
            'Roughages.required' => 'Pole z błonnikiem jest wymagane',
            'Roughages.numeric' => 'Pole z błonnikiem musi być liczbą',
            'Roughages.min' => 'Pole z błonnikiem musi być większe bądź równe 0',
            'Proteins.required' => 'Pole z białkiem jest wymagane',
            'Proteins.numeric' => 'Pole z białkiem musi być liczbą',
            'Proteins.min' => 'Pole z białkiem musi być większe bądź równe 0',
            'Vitamins.max' => 'Maksymalna ilość znaków w polu z witaminami to 255',
            'Vitamins.string' => 'Pole z witaminami musi być stringiem',
            'Category.required' => 'Pole z kategorią musi zostać wypełnione',
            'Category.integer' => 'Pole z kategorią ma błędną wartość',
            'Category.exists' => 'Używasz nieistniejącej kategorii',
            'Category.not_in' => 'Wybierz kategorię produktu',
        ];
    }
}
