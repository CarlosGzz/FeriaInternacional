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
            'titulo' => 'required|min:3|max:200',
            'fechaInicio' => 'required|date',
            'fechaFinal' => 'required|date',
            'lugar' => 'required|min:3|max:400',
            'tema_id' => 'required',
            'tipo' => 'required',
            'estatus' => 'required',
            'user_id' => 'required',
        ];
    }
}
