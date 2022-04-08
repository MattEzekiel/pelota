<?php

namespace App\Http\Controllers;

//use App\Cart\Carrito;
//use App\Cart\CarritoItem;
use App\Models\Ordenes;
use App\Models\Pelota;
use Illuminate\Http\Request;
use App\Repositories\PelotaRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Carrito;

class TiendaController extends Controller
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
        $pelotas = $this->repository->todo($formParams);
        return view('tienda.index', compact('pelotas','formParams'));
    }

    public function ver ($pelota)
    {
        $pelota = $this->repository->getByPk($pelota);
        return view('tienda.detalle', compact('pelota'));
    }

    public function addCarrito(Request $request, $id)
    {
        $pelota = Pelota::find($id);
        $oldCarrito = Session::has('carrito') ? Session::get('carrito') : null;
        $carrito = new Carrito($oldCarrito);
        $carrito->add($pelota,$pelota->id);

        $request->session()->put('carrito',$carrito);
        return redirect()->route('tienda.index');
    }

    public function getReduceByOne($id)
    {
        $oldCarrito = Session::has('carrito') ? Session::get('carrito') : null;
        $carrito = new Carrito($oldCarrito);
        $carrito->reduceByOne($id);

        if(count($carrito->pelotas) > 0){
            Session::put('carrito',$carrito);
        }else{
            Session::forget('carrito');
        }

        return redirect()
            ->route('tienda.shoppingCarrito')
            ->with('message','Se ha reducido la cantidad de pelotas del carrito')
            ->with('message_type','success');
    }

    public function getAddByOne(Request $request, $id)
    {
        $pelota = Pelota::find($id);
        $oldCarrito = Session::has('carrito') ? Session::get('carrito') : null;
        $carrito = new Carrito($oldCarrito);
        $carrito->add($pelota,$pelota->id);

        $request->session()->put('carrito',$carrito);
        return redirect()
            ->route('tienda.shoppingCarrito')
            ->with('message','Se ha agregado una pelota más al carrito')
            ->with('message_type','success');
    }

    public function removerPelota($id)
    {
        $oldCarrito = Session::has('carrito') ? Session::get('carrito') : null;
        $carrito = new Carrito($oldCarrito);

        $carrito->removerPelota($id);

        if(count($carrito->pelotas) > 0){
            Session::put('carrito',$carrito);
        }else{
            Session::forget('carrito');
        }

        return redirect()
            ->route('tienda.shoppingCarrito')
            ->with('message','Se ha quitado la pelota del  carrito')
            ->with('message_type','success');
    }

    public function getCarrito()
    {
        if(!Session::has('carrito')){
            return redirect()
                ->route('tienda.index')
                ->with('message','Para acceder al carrito debe tener por lo menos tener una pelota agregada al carrito')
                ->with('message_type','info');

        }
        $oldCarrito= Session::get('carrito');
        $carrito = new Carrito($oldCarrito);
        return view('tienda.carrito', ['pelotas' => $carrito->pelotas, 'precioTotal' => $carrito->precioPelotas]);
    }

    public function checkout()
    {
        if(!Session::has('carrito')){
            return redirect()
                ->route('tienda.index')
                ->with('message','Para acceder al checkout debe tener por lo menos tener una pelota agregada al carrito')
                ->with('message_type','info');
        }
        $oldCarrito = Session::get('carrito');
        $carrito = new Carrito($oldCarrito);
        $total =  $carrito->precioPelotas;
        return view('tienda.checkout', ['pelotas' => $carrito->pelotas,'total'=> $total]);
    }

    public function procesando()
    {
        if(!Session::has('carrito')){
            return redirect()
                ->route('tienda.index')
                ->with('message','Para acceder al checkout debe tener por lo menos tener una pelota agregada al carrito')
                ->with('message_type','info');
        }
        $oldCarrito = Session::get('carrito');
        $carrito = new Carrito($oldCarrito);
        $total =  $carrito->precioPelotas;
        return view('tienda.procesando', ['pelotas' => $carrito->pelotas,'total'=> $total]);
    }

    public function postCheckout(Request $request)
    {
        if(!Session::has('carrito')){
            return redirect()
                ->route('tienda.index')
                ->with('message','Para acceder al pago debe tener por lo menos tener una pelota agregada al carrito y proceder al checkout antes de intentar pagar')
                ->with('message_type','info');
        }
        $oldCarrito = Session::get('carrito');
        $carrito = new Carrito($oldCarrito);

        $request->validate(Ordenes::$rules,Ordenes::$errores);

        Ordenes::create($request->only(['carrito','nombre','email','direction','tel','total','usuario_id']));


        Session::forget('carrito');
        return redirect()
            ->route('perfil.index')
            ->with('message', 'Éxito en la compra de su pelota.')
            ->with('message_type','success');
    }
}
