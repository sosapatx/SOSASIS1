<?php

namespace sosapatex\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratoFormRequest extends FormRequest
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
            'predioC'=>'required',
            'curpC'=>'required',
            'rutaC'=>'required',
            'descuento'=>'required',
            'noMedidor'=>'required',
            'marca'=>'required',
            'diametroToma'=>'required',
            'tipoToma'=>'required',
            'edoToma'=>'required',
            'clasificacion'=>'required',
            'fechaContrato'=>'required',
            'longuitud'=>'required',
            'latitud'=>'required'
        ];
    }
}
