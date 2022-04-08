<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Pelota
 *
 * @property int $id
 * @property string $nombre
 * @property string $historia
 * @property int $precio
 * @property string $fecha
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Pelota newModelQuery()
 * @method static Builder|Pelota newQuery()
 * @method static Builder|Pelota query()
 * @method static Builder|Pelota whereCreatedAt($value)
 * @method static Builder|Pelota whereFecha($value)
 * @method static Builder|Pelota whereHistoria($value)
 * @method static Builder|Pelota whereId($value)
 * @method static Builder|Pelota whereNombre($value)
 * @method static Builder|Pelota wherePrecio($value)
 * @method static Builder|Pelota whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Mundial $mundial
 * @property-read Torneo $torneo
 * @property-read Collection|Torneo[] $torneos
 * @property-read int|null $torneos_count
 * @property-read Collection|Mundial[] $mundiales
 * @property-read int|null $mundiales_count
 * @property int|null $mundial_id
 * @property int|null $torneo_id
 * @method static Builder|Pelota whereMundialId($value)
 * @method static Builder|Pelota whereTorneoId($value)
 */
class Pelota extends Model
{
    use SoftDeletes;
//    use HasFactory;
    protected $table = "pelotas";
    protected $primaryKey = "id";

    protected $fillable = [
        'nombre',
        'historia',
        'precio',
        'fecha',
        'imagen',
        'mundial_id',
        'torneo_id',
    ];

    /**@var string[] Las reglas de validación*/
    public static $rules = [
        'nombre' => 'required|min:4',
        'historia' => 'required|min:10',
        'precio' => 'required|numeric',
        'fecha' => 'required|date',
    ];

    /**@var  String[] Los mensajes de validación*/
    public static $errorMessages = [
        'nombre.required' => 'El campo nombre está vacío.',
        'historia.required' => 'El campo historia está vacío.',
        'precio.required' => 'El campo precio está vacío.',
        'fecha.required' => 'El campo fecha está vacío.',
        'nombre.min' => 'El nombre es demasiado corto, al menos 4 caracteres',
        'historia.min' => 'Genio del futbol mundial, el texto es demasiado corto, escribí aunque sea 10 caracteres.',
        'precio.numeric' => 'El campo precio debe ser solo números.',
        'fecha.date' => 'El campo fecha debe ser una fecha existente.',
        'torneo.required' => 'Debe seleccionar un torneo',
    ];

    public function mundial()
    {
        return $this->belongsTo(Mundial::class,  'mundial_id',  'mundial_id');
    }

    public function torneos()
    {
        return $this->belongsTo(Torneo::class, 'torneo_id' ,'torneo_id');
    }
}
