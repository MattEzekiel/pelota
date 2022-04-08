<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

/**
 * App\Models\Usuario
 *
 * @property int $usuario_id
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUsuarioId($value)
 * @mixin \Eloquent
 */

class Usuario extends User
{
    protected $fillable = [
        'nombre',
        'email',
        'password',
        'direction',
        'edad',
        'tel',
        'role',
    ];

    protected $table = "usuarios";
    protected $primaryKey = "usuario_id";

    /**@var string[] */
    protected $hidden = ['password','remember_token'];

    public static $rules =[
        'nombre' => 'required',
        'email' =>'required|min:6|email|unique:usuarios,email',
        'password' => 'required|min:8',
        'edad' => 'date|nullable',
        'tel' => 'numeric|nullable',
    ];

    public static $reglasEdit = [
        'nombre' => 'required',
        'email' =>'required|min:6|email',
        'fecha_nacimiento' => 'date|nullable',
        'tel' => 'numeric|nullable',
    ];

    public static $errores = [
        'nombre.required' => 'El campo nombre se encuentra vacío',
        'email.required' => 'El campo Email se encuentra vacío',
        'email.min' => 'El email es muy corto, necesita ingresar por lo menos 6 caracteres',
        'email.email' => 'El email debe ser una dirección de correo válida',
        'email.unique' => 'El email que está introduciendo ya existe',
        'edad.date' => 'La edad tiene que ser una fecha válida',
        'fecha_nacimiento.date' => 'La edad tiene que ser una fecha válida',
        'tel.numeric' => 'El teléfono debe ser un número',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    public function ordenes()
    {
        return $this->hasMany(Ordenes::class);
    }
}
