<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EdicionRequest extends Request
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
            'pais' => 'required|min:3|max:120',
            'fechaInicio' => 'required',
            'fechaFinal' => 'required',
            'administrador_id' => 'required'
        ];
    }
}