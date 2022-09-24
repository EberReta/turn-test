<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MayoristaRequest extends FormRequest
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
            'name' => ['required'],
            'lastName' => [''],
            'company' => ['required'],
            'email' => ['required', 'unique:users'],
            'phone' => ['required'],
            'discount' => [ 'numeric'],
            'businessName' => [],
            'cfdi' => [],
            'rfc' => [],
            'sameAddress' => [],
            'direccion_envio' => [],
            'direccion_facturacion' => [''],
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre',
            'lastName' => 'apellido',
            'company' => 'empresa',
            'email' => 'correo',
            'phone' => 'teléfono',
            'discount' => 'descuento',
            'businessName' => 'razón Social',
            'cfdi' => 'uso de CFDI',
            'rfc' => 'RFC'
        ];
    }
}
