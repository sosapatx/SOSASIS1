<?php

namespace sosapatex\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PredioFormRequest extends FormRequest
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
            'curpP'=>'required',
            'direccion'=>'required',
            'colonia'=>'required',
            'localidad'=>'required'
        ];
    }
}
