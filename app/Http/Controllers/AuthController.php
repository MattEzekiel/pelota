<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function registroForm()
    {
        return view('auth.registrarse');
    }

    public function login(Request $request)
    {
        $credenciales = $request->only(['password','email']);
        if(!auth()->attempt($credenciales)){
            return redirect()
                ->route('auth.login-form')
                ->withInput()
                ->with('message','Email o Contraseña inválido')
                ->with('message_type','danger');
        }

        if(\auth()->user()->role !== 'admin'){
            return redirect()
                ->route('perfil.index')
                ->with('message','¡Bienvenido ' . auth()->user()->nombre .'!')
                ->with('message_type','success');
        }
        return redirect()
            ->route('pelotas.index')
            ->with('message','¡Bienvenido ' . auth()->user()->nombre .'!')
            ->with('message_type','success');
    }

    public function registrarse(Request $request)
    {
        $request->validate(Usuario::$rules,Usuario::$errores);

        $usuario = Usuario::create($request->only(['nombre','email','password','direction','fecha_nacimiento','tel']));

        Auth::login($usuario);

        return redirect()
            ->route('perfil.index')
            ->with('message', 'Su usuario ha sido generado con éxito')
            ->with('message_type','success');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()
            ->route('auth.login')
            ->with('message','La sesión ha sido cerrada con éxito')
            ->with('message_type','success');
    }
}
