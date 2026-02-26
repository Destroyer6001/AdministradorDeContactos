<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends BaseRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'first_name' => 'required|string|max:150',
            'last_name' => 'required|string|max:150',
            'email' => ['required', 'email', Rule::unique('contacts', 'email')->ignore($this->id)],
            'entity_id' => 'required|exists:entities,id',
            'document_number' => ['required', 'max:100', Rule::unique('contacts', 'document_number')->ignore($this->id)]
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'El campo nombre es un campo requerido',
            'first_name.string' => 'El campo nombre debe ser un texto',
            'first_name.max' => 'El campo nombre no debe tener mas de 100 caracteres',
            'last_name.required' => 'El campo apellidos es un campo requerido',
            'last_name.string' => 'El campo apellidos debe ser un texto',
            'last_name.max' => 'El campo apellidos no debe tener mas de 100 caracteres',
            'email.email' => 'El campo email debe ser un email valido',
            'email.required' => 'El campo email es un campo requerido',
            'email.unique' => 'El campo email debe ser unico, ya hay otro contacto con este email',
            'entity_id.required' => 'El campo entidad es un campo requerido',
            'entity_id.exists' => 'La entidad seleccionada no se encuentra registrada en el sistema',
            'document_number.required' => 'El campo documento de identidad es un campo requerido',
            'document_number.max' => 'El campo documento de identidad no debe superar los 100 caracteres',
            'document_number.unique' => 'El campo documento de identidad debe ser unico, ya hay otro contacto con este documento de identidad'
        ];
    }
}
