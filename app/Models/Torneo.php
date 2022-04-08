<?php

namespace App\Models;

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
 * @method static \Illuminate\Database\Eloquent\Builder|Mundial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mundial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mundial query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mundial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mundial whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mundial whereMundialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mundial whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mundial whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mundial whereYear($value)
 * @mixin \Eloquent
 * @property int $torneo_id
 * @method static \Illuminate\Database\Eloquent\Builder|Torneo whereTorneoId($value)
 */
class Torneo extends Model
{
//    use HasFactory;
    protected $table = 'torneos_locales';
    protected $primaryKey = 'torneo_id';

    public function torneos()
    {
        return $this->hasMany(Pelota::class,'torneo_id','torneo_id');
    }
}
