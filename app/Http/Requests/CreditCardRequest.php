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
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'appartement' => ['integer', 'gte:0'],
            'tel' => ['required', 'regex:/^\d{3}[- ]?\d{3}[ -]?\d{4}$/'],
            'street' => ['required','regex:/^[A-zÀ-ú -]{2,50}$/', 'string'],
            'door' => ['required', 'integer'],
            'zip' => ['required', 'regex:/^[a-zA-Z]\d[a-zA-Z][ -]?\d[a-zA-Z]\d$/'],
            'town' => ['required', 'string', 'regex:/^[A-zÀ-ú -]{2,50}$/', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
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
            'email.required' => 'Votre email est requis',
            'email.string' => 'Votre email doit être une chaine de caractères',
            'email.email' => 'Votre email doit être du format email standard',
            'email.max' => 'Votre email doit être d\'une longueur de 255 caractères maximum',
            'tel.required' => 'Votre numéro de téléphone est requis',
            'tel.regex' => 'Le format doit etre (888-888-8888)',
            'firstName.required' => 'Votre prénom est requis',
            'firstName.string' => 'Votre prénom doit être une chaine de caracteres',
            'firstName.max' => 'Votre prénom doit être d\'une longueur de 255 caractères maximum',
            'lastName.required' => 'Votre nom est requis',
            'lastName.string' => 'Votre nom doit être une chaine de caracteres',
            'lastName.max' => 'Votre nom doit être d\'une longueur de 255 caractères maximum',
            'street.required' => 'Votre rue est requise',
            'street.string' => 'Votre rue doit est une chaine de caractère',
            'street.regex' => 'La rue doit seulement contenir des lettres et -',
            'door.required' => 'Votre porte est requise',
            'door.integer' => 'Votre porte doit être constitué seulement de chiffre',
            'zip.required' => 'Votre code postal est requis',
            'zip.regex' => 'Votre code postal n\'est pas valide',
            'zip.regex' => 'Format (A1B-2C3) ou (A1B 2C3) seulement',
            'town.required' => 'Votre ville est requis',
            'town.string' => 'Votre ville doit être une chaine de caracteres',
            'town.max' => 'Votre ville doit être d\'une longueur de 255 caractères maximum',
            'town.regex' => 'La ville doit seulement contenir des lettres et -',
            'appartement.integer' => "L'appartement doit seulement contenir des chiffres",
            'appartement.gte' => "L'appartement doit etre superieur a 0",
        ];
    }
}
