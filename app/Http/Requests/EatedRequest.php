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
}
