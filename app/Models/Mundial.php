<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Mundial
 *
 * @property int $mundial_id
 * @property string $nombre
 * @property string $description
 * @property string $year
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static Builder|Mundial newModelQuery()
 * @method static Builder|Mundial newQuery()
 * @method static Builder|Mundial query()
 * @method static Builder|Mundial whereCreatedAt($value)
 * @method static Builder|Mundial whereDescription($value)
 * @method static Builder|Mundial whereMundialId($value)
 * @method static Builder|Mundial whereNombre($value)
 * @method static Builder|Mundial whereUpdatedAt($value)
 * @method static Builder|Mundial whereYear($value)
 * @mixin \Eloquent
 */
class Mundial extends Model
{
//    use HasFactory;
    protected $table = 'mundiales';
    protected $primaryKey = 'mundial_id';

    protected $fillable = [
        'nombre',
        'description',
        'year',
    ];

    /**@var string[] Las reglas de validación*/
    public static $rules = [
        'nombre' => 'required|min:4',
        'description' => 'required|min:10',
        'year' => 'required|date',
    ];

    /**@var  String[] Los mensajes de validación*/
    public static $errorMessages = [
        'nombre.required' => 'El campo nombre está vacío.',
        'description.required' => 'El campo descripción está vacío.',
        'year.required' => 'El campo fecha está vacío.',
        'nombre.min' => 'El nombre es demasiado corto.',
        'description.min' => 'El campo descripción es demasiado corto.',
        'year.date' => 'El campo fecha debe ser una fecha existente.',
    ];

    public function mundial()
    {
        return $this->hasMany(Pelota::class,'mundial_id','mundial_id');
    }
}
