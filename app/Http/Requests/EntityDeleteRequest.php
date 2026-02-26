<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntityDeleteRequest extends BaseRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ids' => 'required|array',
            'ids.*' => 'exists:entities,id'
        ];
    }

    public function messages()
    {
        return [
            'ids.required' => 'Debes selecionar al menos una entidad para eliminar',
            'ids.array' => 'El campo ids debe ser un arreglo',
            'ids.*.exists' => 'Hay uno de las entidades seleccionada que ya no existe en el sistema',
        ];
    }
}
