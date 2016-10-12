<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EventosRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'titulo' => 'required|min:3|max:120',
            'fechaInicio' => 'required|date',
            'fechaFinal' => 'required|date',
            'estatus' => 'required'
            'lugar' => 'required'
            'estatus' => 'required'
            'user_id' => 'required',
            'edicion_id' => 'required',
        ];
    }
}
