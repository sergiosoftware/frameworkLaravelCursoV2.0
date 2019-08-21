<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // <-- OJO cualquier usuario está autorizado
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required',
            'precio' => 'required',
            'iva' => 'required',
            'cantidad_disponible' => 'required'
        ];
    }
    public function messages() {
        return [
            'nombre.required' => 'El producto requiere un nombre',
            'precio.required' => 'No ha ingresado el precio'
        ];
    }
}
