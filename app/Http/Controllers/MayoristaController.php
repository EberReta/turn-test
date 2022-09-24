<?php

namespace App\Http\Controllers;

use App\Http\Requests\MayoristaRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\Request;

class MayoristaController extends Controller
{
    public function store(MayoristaRequest $request)
    {
        $data = $request->all();

        $mayorista = User::create([
            'name' => $data['name'],
            'lastName' => $data['lastName'] ?? "",
            'company' => $data['company'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'discount' => $data['discount'],
            'businessName' => $data['businessName'] ?? "",
            'cfdi' => $data['cfdi'] ?? "",
            'rfc' => $data['rfc'] ?? "",
            'role' => "Mayorista",
            'status' => 1,
        ]);

        if ($mayorista) {



            if (isset($data['direccion_envio'])) {
                $direccion_envio = $data['direccion_envio'];
                $address_envio = Address::create([
                    'user_id' => $mayorista->id,
                    'contactName' => $direccion_envio['contactName'],
                    'address' => $direccion_envio['address'],
                    'postalCode' => $direccion_envio['postalCode'],
                    'neighborhood' => $direccion_envio['neighborhood'],
                    'city' => $direccion_envio['city'],
                    'state' => $direccion_envio['state'],
                    'email' => $direccion_envio['email'],
                    'phone' => $direccion_envio['phone'],
                    'type' => "Default",
                    'status' => 1,
                ]);
            }

            if (isset($data['direccion_facturacion'])) {
                $direccion_facturacion = $data['direccion_facturacion'];
                $address_facturacion = Address::create([
                    'user_id'     => $mayorista->id,
                    'contactName' => $direccion_facturacion['contactName'],
                    'address'     => $direccion_facturacion['address'],
                    'postalCode'  => $direccion_facturacion['postalCode'],
                    'neighborhood' => $direccion_facturacion['neighborhood'],
                    'city'        => $direccion_facturacion['city'],
                    'state'       => $direccion_facturacion['state'],
                    'email'       => $direccion_facturacion['email'],
                    'phone'       => $direccion_facturacion['phone'],
                    'type'        => "Usuario",
                    'status' => 1,
                ]);
            }

            return response([
                'status' => true,
                'message' => 'Mayorista creado correctamente',
            ]);
        } else {
            return response([
                'status' => false,
                'message' => 'Error al crear el mayorista',
            ]);
        }
    }


    public function list($search = "")
    {
        $mayoristasQuery = User::withCount('quotes')->withCount('orders')->where('role', 'Mayorista');

        if ($search) {
            $mayoristasQuery = $mayoristasQuery->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('lastname', 'like', "%$search%")
                    ->orWhere('company', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('phone', 'like', "%$search%")
                    ->orWhere('discount', 'like', "%$search%");
            });
        }

        $mayoristas = $mayoristasQuery->get();

        foreach ($mayoristas as $key => $mayorista) {
            $mayorista['requests_count'] = $mayorista->quotes()->where('status','Solicitud')->count();
        }

        return response([
            'status' => true,
            'mayoristas' => $mayoristas
        ]);
    }
}
