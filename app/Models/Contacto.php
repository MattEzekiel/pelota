<?php
namespace App\Models;

use Eloquent;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    /**@var string[] Las reglas de validación*/
    public static $rules = [
        'nombre' => 'required|min:4',
        'email' => 'required',
        'mensaje' => 'required|min:10',
    ];

    /**@var  String[] Los mensajes de validación*/
    public static $errorMessages = [
        'nombre.required' => 'El campo nombre está vacío.',
        'email.required' => 'El campo email está vacío.',
        'mensaje.required' => 'El campo mensaje está vacío.',
        'nombre.min' => 'El nombre es demasiado corto, al menos 4 caracteres debe escribir.',
        'mensaje.min' => 'El campo mensaje es demasiado corto, al menos 10 caracteres para enviar el mensaje.',
    ];
}
