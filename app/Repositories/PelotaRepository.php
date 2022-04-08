<?php


namespace App\Repositories;

//Esta clase funciona como repositorio de pelotas.

use App\Models\Pelota;
use Illuminate\Database\Eloquent\Collection;

class PelotaRepository implements PelotaRepositoryInterface
{
    /**
     * @param array $searchParams
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|Pelota[]|Collection
     */
    public function all($searchParams = [])
    {
        $pelotasQuery = Pelota::with(['mundial', 'torneos'])->withTrashed();
        if(isset($searchParams['nombre'])){
            $pelotasQuery->where('nombre','like','%'.$searchParams['nombre'].'%');
        }
        return $pelotasQuery->paginate(50)->withQueryString();
    }

    public function todo($searchParams = [])
    {
        $pelotasQuery = Pelota::with(['mundial', 'torneos']);
        if(isset($searchParams['nombre'])){
            $pelotasQuery->where('nombre','like','%'.$searchParams['nombre'].'%');
        }
        return $pelotasQuery->paginate(50)->withQueryString();
    }

    /**
     * @param int $pk
     * @return Pelota |\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getByPk($pk)
    {
        return Pelota::withTrashed()->findOrFail($pk);
    }

    /**
     * @param array $data
     * @return Pelota |\Illuminate\Database\Eloquent\Model
     */
    public function create($data = [])
    {
        return Pelota::create($data);
    }

    public function update($pk, $data = [])
    {
        $pelota = Pelota::withTrashed()->findOrFail($pk);
        $pelota->update($data);
        return $pelota;
    }

    public function delete($pk)
    {
        $pelota = Pelota::findOrFail($pk);

        $pelota->delete();

        return $pelota;
    }
}
