<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoFormRequest extends FormRequest
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
            //
            'idcategoria_producto'=>'required',
            'codigo'=>'max:45',
            'nombre'=>'required|max:45',            
            'stock'=>'required|numeric',
            'descripcion'=>'max:45',
            'imagen'=>'mimes:jpeg,bmp,png'

        ];
    }
}
