<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function gracias(Request $request)
    {
        $request->validate(Contacto::$rules, Contacto::$errorMessages);
        return view('gracias.gracias');
    }
}
