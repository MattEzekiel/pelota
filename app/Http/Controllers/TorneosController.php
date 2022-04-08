<?php

namespace App\Http\Controllers;

use App\Models\Torneo;
use Illuminate\Http\Request;

class TorneosController extends Controller
{
    public function index(Request $request)
    {
        $torneos = Torneo::paginate(5)->fragment('torneos_locales');
        return view('torneos.index',compact('torneos'));
    }
}
