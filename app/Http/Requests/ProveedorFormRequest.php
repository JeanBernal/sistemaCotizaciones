<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorFormRequest extends FormRequest
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
            'nombre'=>'required|max:45',
            'num_documento'=>'required|max:45',
            'tipo_documento'=>'required|max:45',
            'pais'=>'max:45',
            'ciudad'=>'max:45',
            'direccion'=>'max:45',
            'telefono'=>'max:45',
            'email'=>'max:45',
            'estado'=>'max:45'
        ];
    }
}
