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
    public function messages(){
        return [
            'Calf.numeric' => 'Pole z łydką musi być liczbą',
            'Calf.required' => 'Pole łydka jest wymagane',
            'Pas.numeric' => 'Pole z pasem musi być liczbą',
            'Pas.required' => 'Pole pasem jest wymagane',
            'Waist.numeric' => 'Pole z talią musi być liczbą',
            'Waist.required' => 'Pole talią jest wymagane',
            'Chest.numeric' => 'Pole z klatką piersiową musi być liczbą',
            'Chest.required' => 'Pole klatką piersiową jest wymagane',
            'Hips.numeric' => 'Pole z biodrami musi być liczbą',
            'Hips.required' => 'Pole biodrami jest wymagane',
            'Thigh.numeric' => 'Pole z udem musi być liczbą',
            'Thigh.required' => 'Pole udem jest wymagane',
            'Arm.numeric' => 'Pole z ramionami musi być liczbą',
            'Arm.required' => 'Pole ramionami jest wymagane',
        ];
    }
}
