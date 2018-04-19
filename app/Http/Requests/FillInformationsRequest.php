<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FillInformationsRequest extends FormRequest
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
            'PersonId' => 'required|integer',
            'Name' => 'required|max:255',
            'LastName' => 'required|max:255',
            'Height' => 'required|numeric',
            'Weight' => 'required|numeric',
            'Age' => 'required|date|date_format:Y-m-d|before:today',
            'Gender' => 'required|in:Male,Female',
            'Destination' => 'required|in:LoseWeight,GainWeight',
            'FitWaist' => 'required|in:Yes,No',
            'Pattern' => 'required|in:Mifflin,Harris',
            'ShowBMI' => 'required|in:Yes,No',
        ];
    }
    public function messages(){
        return [
            'Name.required' => 'Pole z imieniem jest wymagane',
            'Name.max' =>'Maksymalna ilość znaków w polu z imieniem to 255',
            'LastName.required' => 'Pole z nazwiskiem jest wymagane',
            'LastName.max' =>'Maksymalna ilość znaków w polu z nazwiskiem to 255',
            'Height.required' => 'Pole wysokość jest wymagane',
            'Height.numeric' => 'Pole wysokość musi być liczbą',
            'Weight.required' => 'Pole waga jest wymagane',
            'Weight.numeric' => 'Pole waga musi być liczbą',
            'Age.required' => 'Pole z wiekiem jest wymagane',
            'Age.date' => 'Błędna data, w polu z wiekiem',
            'Age.date_format' => 'Dostępyn format daty to : Rok-Miesiąc-Dzień',
            'Age.before' => 'Błędna data, nie mogłeś się urodzić w przyszłości',
            'Destination.required' => 'Pole z celem jest wymagane',
            'Destination.in' => 'Została wysłana zła wartość, w polu z celem',
            'FitWaist.required' => 'Pole z opaską jest wymagane',
            'FitWaist.in' => 'Została wysłana zła wartość, w polu z opaską',
            'Pattern.in' => 'Możesz wybrać jedynie wzory Mifflina lub Harrisa'
        ];
    }
}
