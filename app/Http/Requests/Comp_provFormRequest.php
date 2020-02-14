<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Comp_provFormRequest extends FormRequest
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

            'idproveedor'=>'required',
            'tipo_comprobante'=>'required|max:45',
            'serie_comprobante'=>'max:45',
            'num_comprobante'=>'required|max:45',
            'producto_idproducto'=>'required',
            'cantidad'=>'required',
            'precio_compra'=>'required',
            'precio_venta'=>'required'            

        ];
    }
}
