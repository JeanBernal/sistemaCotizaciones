<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Cotizacion_prodFormRequest extends FormRequest
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
            'cliente_id'=>'required',
            'tipo_comprobante'=>'required|max:45',
            'serie_comprobante'=>'max:45',
            'num_comprobante'=>'required|max:45',
            'producto_id'=>'required',
            'cantidad'=>'required',
            'precio_cotizacion'=>'required',
            'descuento'=>'required',
            'total_cotizacion'=>'required'

            
        ];
    }
}
