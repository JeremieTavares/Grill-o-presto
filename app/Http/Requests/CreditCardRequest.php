<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditCardRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|regex:/^[A-zÀ-ú -]{2,75}$/',
            'card_number' => ['required', 'integer', 'regex:/^\d{4}\d{4}\d{4}\d{4}$/'],
            'month' => ['required', 'regex:/^0[1-9]|1[0-2]$/'],
            'year' => ['required', 'regex:/^202[2-9]$/'],
            'cvc' => ['required', 'regex:/^\d{3,4}$/'],
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Le nom est requis',
            'name.regex' => 'Votre nom doit seulement contenir des lettres et -',
            'card_numbert.regex' => 'Le numéro de carte de credit doit comporter 16 chiffres sans - ni . ni espace',
            'card_number.required' => 'Le numéro de carte de credit est requis',
            'card_number.integer' => 'Le numéro de carte de credit doit etre des entiers',
            'month.required' => 'Le mois de la carte est requis',
            'month.regex' => 'Le mois doit se situer entre 01-12',
            'year.regex' => "L'année de la carte doit se situer entre 2022 et 2030",
            'year.required' => "L'année de la carte est requise",
            'cvc.required' => 'Le code de sécurité est requis',
            'cvc.regex' => 'Le code de securite doit etre composer de 3 ou 4 chiffres seulement',
        ];
    }
}
