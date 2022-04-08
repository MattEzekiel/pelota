<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ordenes extends Model
{
    protected $fillable= [
        'orden_id',
        'carrito',
        'nombre',
        'email',
        'direction',
        'tel',
        'total',
        'estado',
        'usuario_id',
    ];

    protected $table = "ordenes";
    protected $primaryKey = "orden_id";

    public static $rules =[
        'nombre' => 'required',
        'email' =>'required|min:6|email',
        'tel' => 'numeric|nullable',
        'direction' => 'required',
        'total' => 'required',
        'carrito' => 'required',
    ];

    public static $errores = [
        'nombre.required' => 'El campo nombre se encuentra vacío',
        'carrito.required' => 'El carrito se encuentra vacío',
        'email.required' => 'El campo Email se encuentra vacío',
        'email.min' => 'El email es muy corto, necesita ingresar por lo menos 6 caracteres',
        'email.email' => 'El email debe ser una dirección de correo válida',
        'tel.numeric' => 'El teléfono debe ser un número',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function cantidadDeVentas(){
        return self::orderBy('carrito','DESC')->count();
    }

    public function totalVentas(){
       return self::orderBy('total','DESC')->sum('total');
    }

    public function cantidadVentasHoy(){
        return self::orderBy('carrito','DESC')->whereDate('created_at', Carbon::today())->count();
    }

    public function totalVentasHoy(){
        return self::orderBy('total','DESC')->whereDate('created_at', Carbon::today())->sum('total');
    }
}
