<?php

namespace App\Http\Controllers;

use App\Models\Ordenes;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerfilController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $ordenes = Ordenes::where('usuario_id', $usuario->usuario_id)
            ->orderBy('orden_id','DESC')
            ->paginate(15);
        $ordenes->sortDesc();

        return view('perfil.index',compact('usuario'),compact('ordenes'));
    }

    public function editarPerfil(Usuario $usuario)
    {
        if ($usuario->usuario_id !== Auth::user()->usuario_id){
            return redirect()
                ->route('perfil.index')
                ->with('message','Usted no puede editar este perfil')
                ->with('message_type','danger');
        }

        return view('perfil.editar',compact('usuario'));
    }

    public function editar(Request $request, Usuario $usuario)
    {
        $request->validate(Usuario::$reglasEdit,Usuario::$errores);
//        dd($request['fecha_nacimiento']);
        $usuario->update($request->only(['nombre','email','direction','fecha_nacimiento','tel']));

        $usuario->update(['fecha_nacimiento' => $request['fecha_nacimiento']]);

        return redirect()
            ->route('perfil.index')
            ->with('message','Sus datos han sido cambiados con éxito');
    }
}
