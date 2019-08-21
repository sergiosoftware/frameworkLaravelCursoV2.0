<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
    // public function rules() {
    //     // dd($this->all()); // << ver contenido de request/$this
    //     return [ // reglas:
    //         'name' => 'required',
    //         'email' => 
    //             "required|unique:users,email,{$this->route('usuario')}"
    //     ];
    // }
    public function rules() {
        // dd($this->all()); // << es bueno que verifique el contenido de la instancia request/$this
        return [ //////////////// se ingresaron reglas
            'name' => 'required',
            'email' => "required|unique:users,email,{$this->route('usuario')}" 
            // en la tabla users el email debe ser único para el usuario en curso; http://appxx.test/usuarios/999/edit
        ];
    }
}
