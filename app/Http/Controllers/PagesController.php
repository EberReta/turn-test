<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function mayorista()
    {
        $mayoristas = User::where('role', 'Mayorista')->get();

        return view('mayorista')->with('mayoristas', $mayoristas);
    }

    public function mayoristaCreate()
    {
        return view('mayorista.create');
    }
}
