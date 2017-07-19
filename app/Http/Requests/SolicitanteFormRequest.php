<?php

namespace sosapatex\Http\Requests;
use sosapatex\Http\Requests\Request;

class SolicitanteFormRequest extends Request
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
            'CURP'=>'required',
            'nombreS'=>'required',
            'direccionS'=>'required'
        ];
    }
}
