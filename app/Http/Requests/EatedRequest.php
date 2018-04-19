<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EatedRequest extends FormRequest
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
            'EatedBy' => 'required|integer',
            'EatedProduct' => 'required|string',
            'EatedWeight' => 'required|numeric',
            'EatedAbout' => 'required|date_format:H:i',
            'EatedDate' => 'required|date|date_format:Y-m-d',
        ];
    }
    public function messages(){
        return [
            'EatedProduct.required' => 'Pole z nazwą produktu wymagane',
            'EatedWeight.numeric' => 'Pole z wagą musi być liczbą',
            'EatedWeight.required' => 'Pole z wagą jest wymagane',
            'EatedAbout.required' => "Pole z dniem jest wymagane",
            'EatedAbout.date_format' => 'Błędny format czasu w polu z dniem',
            'EatedDate.required' => 'Pole z godziną jest wymagane',
            'EatedDate.date' => 'Błędne dane w polu z godziną',
            'EatedDate.date_format' => 'Błędne format danych w polu z godziną',
        ];
    }
}
