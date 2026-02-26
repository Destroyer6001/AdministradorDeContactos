<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EntityRequest extends BaseRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'name' => ['required', 'string', 'max:100', Rule::unique('entities', 'name')->ignore($this->id)],
            'description' => 'max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es un campo requerido',
            'name.max' => 'El campo nombre no debe tener mas de 100 caracteres',
            'name.string' => 'El campo nombre debe ser un campo tipo texto',
            'name.unique' => 'El campo nombre debe ser unico',
            'description.max' => 'El campo descripcion no debe tener mas de 255 caracteres'
        ];
    }
}
