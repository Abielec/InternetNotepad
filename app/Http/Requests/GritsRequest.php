<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GritsRequest extends FormRequest
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
            'PersonId' => 'integer|required',
            'Calf' => 'numeric|required',
            'Pas' => 'numeric|required',
            'Waist' => 'numeric|required',
            'Chest' => 'numeric|required',
            'Hips' => 'numeric|required',
            'Thigh' => 'numeric|required',
            'Arm' => 'numeric|required',
        ];
    }
}
