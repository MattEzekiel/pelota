<?php
/* @var \App\Models\Usuario[]|\Illuminate\Database\Eloquent\Collection $usuario */
?>
@extends('layouts.main')
@section('title', 'Perfil: '. $usuario->nombre)
@section('mainApp', 'mi-perfil')
@section('main')
    <div class="h80 container">
        <h1 class="text-center text-capitalize">El Jugador:</h1>
        <h2 class="text-center text-primary text-uppercase mb-5">{{$usuario->nombre}}</h2>
        <div class="row w-100">
            <aside class="col-md-4 mb-5 mb-md-0">
                <h3 class="text-center mb-3">Mis datos</h3>
                <ul class="pl-md-4 list-group" style="list-style: none">
                    <li>Nombre: <b>{{$usuario->nombre}}</b></li>
                    <li>Email: <b>{{$usuario->email}}</b></li>
                    @if($usuario->direction == null)
                        <li>Dirección: <b>No hay ingresado ninguna dirección</b></li>
                    @else
                        <li>Dirección: <b>{{$usuario->direction}}</b></li>
                    @endif
                    @if($usuario->fecha_nacimiento  == null)
                        <li>Fecha de Nacimiento: <b>No hay indicado ninguna fecha</b></li>
                    @else
                        <li>Fecha de Nacimiento: <b>{{date('d/m/Y',strtotime($usuario->fecha_nacimiento))}}</b></li>
                    @endif
                    @if($usuario->tel == null)
                        <li>Teléfono: <b>No ha ingresado ninguno</b></li>
                    @else
                        <li>Teléfono: <b>{{($usuario->tel)}}</b></li>
                    @endif
                </ul>
                <a href="{{route('perfil.editarPerfil', ['usuario' => $usuario->usuario_id] )}}" class="btn btn-warning ml-md-4 mt-3">Editar datos</a>
            </aside>
            <section class="col-md-8">
                @if($ordenes !== null)
                <h2 class="text-center">Mis Pedidos</h2>
                <div class="table-responsive">
                    <table class="m-auto table table-bordered">
                        <thead class="m-auto thead-dark">
                        <tr>
                            <th>N° de Orden</th>
                            <th>Pedido</th>
                            <th>Total</th>
                        </tr>
                        </thead>
                        <tbody class="m-auto bg-white">
                        <?php $numero = 1?>
                        @forelse($ordenes as $orden)
                            <tr>
                                <td class="bg-info text-white font-weight-bold">{{$orden->orden_id}}</td>
                                <td>{{$orden->carrito}}</td>
                                <td class="bg-info text-white font-weight-bold">${{number_format($orden->total,0,',','.')}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="h5 bg-info text-white text-center">Todavía no ha realizado ningún pedido</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $ordenes->links() }}
                </div>
                @else
                    <h2 class="text-center">No ha hecho ninguna compra todavía</h2>
                @endif
            </section>
        </div>
    </div>
@endsection
