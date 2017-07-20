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
<<<<<<< HEAD
=======
            'predioC'=>'required',
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
            'curpC'=>'required',
            'rutaC'=>'required',
            'descuento'=>'required',
            'noMedidor'=>'required',
            'marca'=>'required',
<<<<<<< HEAD
=======
            'diametroToma'=>'required',
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
            'tipoToma'=>'required',
            'edoToma'=>'required',
            'clasificacion'=>'required',
            'fechaContrato'=>'required',
<<<<<<< HEAD
=======
            'longuitud'=>'required',
            'latitud'=>'required'
>>>>>>> b787aca1fc0c24432e8dc6adb27883e35e366337
        ];
    }
}
