<?php

namespace App\Http\Controllers;

use App\Models\Mundial;
use App\Models\Ordenes;
use App\Models\Pelota;
use App\Models\Torneo;
use App\Repositories\PelotaRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class PelotasController extends Controller
{

    /**@var PelotaRepositoryInterface*/
    protected $repository;

    /**
     * @param PelotaRepositoryInterface $repository
     */
    public function __construct(PelotaRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $formParams=[];
        if($request->query('nombre')){
            $formParams['nombre'] = $request->query('nombre');
        }
        $pelotas = $this->repository->all($formParams);
        return view('pelotas.index', compact('pelotas','formParams'));
    }

    public function ver ($pelota)
    {
      $pelota = $this->repository->getByPk($pelota);
      return view('pelotas.ver', compact('pelota'));
    }

    public function nuevaForm()
    {
        $torneos = Torneo::all();
        $mundiales = Mundial::all();
        return view('pelotas.nueva',compact('torneos','mundiales'));
    }

    public function crear(Request $request)
    {
        $request->validate(Pelota::$rules, Pelota::$errorMessages);
        $data = $request->only(['nombre', 'historia', 'precio', 'fecha','mundial_id','torneo_id']);

        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $nombreImagen = md5(time()) .  "." . $imagen->clientExtension();
            Image::make($imagen)->resize(600,null,function ($constraint){
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/imgs/' . $nombreImagen));
            $data['imagen'] = 'imgs/' . $nombreImagen;
        }

        $pelota = $this->repository->create($data);
        return redirect()
            ->route('pelotas.index')
            ->with('message', 'Creada la nueva pelota del Diego')
            ->with('message_type', 'success');
    }

    public function editarForm($pelota)
    {
        $pelota = $this->repository->getByPk($pelota);
        $torneos = Torneo::all();
        $mundiales = Mundial::all();

        return view('pelotas.editar', compact('pelota','torneos',$mundiales));
    }

    public function editar(Request $request, $pelota)
    {
        $request->validate(Pelota::$rules, Pelota::$errorMessages);

        $data = $request->only(['nombre','historia','precio','fecha']);

        if($request->hasFile('imagen')){
            $imagen = $request->file('imagen');
            $nombreImagen = md5(time()) .  "." . $imagen->clientExtension();
            Image::make($imagen)->resize(600,null,function ($constraint){
                $constraint->upsize();
                $constraint->aspectRatio();
            })->save(storage_path('/app/public/imgs/' . $nombreImagen));
            $data['imagen'] = 'imgs/' . $nombreImagen;
        }

        $this->repository->update($pelota, $data);
        return redirect()
            ->route('pelotas.index')
            ->with('message','La pelota ha sido editada exitosamente.');
    }

    public function eliminar($pelota)
    {
        $this->repository->delete($pelota);
        return redirect()
            ->route('pelotas.index')
            ->with('message', 'La pelota ha sido eliminada con éxito porque estaba manchada')
            ->with('message_type', 'success');
    }

    public function restaurar( $pelota)
    {
        $pelota = Pelota::withTrashed()->findOrFail($pelota);
        $pelota->restore();
        return redirect()
        ->route('pelotas.index')
        ->with('message', 'La pelota: '. $pelota->nombre .' ha sido restaurado con éxito, porque le quitaron las manchas')
        ->with('message_type', 'success');
    }

    public function ordenes()
    {
        $orders = new Ordenes();
        $cantidadVentas = $orders->cantidadDeVentas();
        $totalVentas = $orders->totalVentas();
        $cantidadVentasHoy = $orders->cantidadVentasHoy();
        $totalVentasHoy = $orders->totalVentasHoy();
        $ordenes = DB::table('ordenes')->paginate(10);

        return view('pelotas.ordenes', compact('ordenes','orders','cantidadVentas','totalVentas', 'cantidadVentasHoy', 'totalVentasHoy'));
    }
}
