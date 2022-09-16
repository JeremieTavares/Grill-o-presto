<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestRequest extends FormRequest
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
            'firstName' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'tel' => ['require', 'numeric', 'regex:/^\d{3}[- ]?\d{3}[ -]?\d{4}$/'],
            'street' => ['required', 'string'],
            'door' => ['required', 'integer', 'max:4'],
            'zip' => ['required', "regex:/^([a-zA-Z]\d[a-zA-Z])\ {0,1}(\d[a-zA-Z]\d)$/"],
            'town' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ];
    }


    public function messages()
    {
        return [
            'email.required' => 'Votre email est requis',
            'email.string' => 'Votre email doit etre une chaine de caracteres',
            'email.email' => 'Votre email doit etre du format email standard',
            'email.max' => 'Votre email doit etre d\'une longueur de 255 carateres maximum',
            'firstName.required' => 'Votre prénom est requis',
            'firstName.string' => 'Votre prénom doit etre une chaine de caracteres',
            'firstName.max' => 'Votre prénom doit etre d\'une longueur de 255 carateres maximum',
            'name.required' => 'Votre nom est requis',
            'name.string' => 'Votre nom doit etre une chaine de caracteres',
            'name.max' => 'Votre nom doit etre d\'une longueur de 255 carateres maximum',
            'street.required' => 'Votre rue est requise',
            'street.string' => 'Votre rue doit est une chaine de caractère',
            'door.required' => 'Votre porte est requise',
            'door.integer' => 'Votre porte doit être constitué seulement de chiffre',
            'door.max' => 'Votre porte doit etre d\'une longueur de 255 carateres maximum',
            'zip.required' => 'Votre code postal est requis',
            'zip.regex' => 'Votre code postal n\'est pas valide',
            'town.required' => 'Votre ville est requis',
            'town.string' => 'Votre ville doit etre une chaine de caracteres',
            'town.max' => 'Votre ville doit etre d\'une longueur de 255 carateres maximum',
            'email.required' => 'Votre code postal est requis',
            'email.string' => 'Votre courriel doit est une chaine de caractères',
            'email.email' => 'Votre courriel n\'est pas valide',
            'email.max' => 'Votre courriel doit etre d\'une longueur de 255 carateres maximum'
        ];
    }
}

