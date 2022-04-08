<?php

namespace App\Http\Controllers;

use App\Models\Mundial;
use App\Models\Pelota;
use App\Models\Torneo;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class MundialesController extends Controller
{
    public function index(Request $request)
    {
        $mundiales = Mundial::all();
        return view('mundiales.index',compact('mundiales'));
    }
}
