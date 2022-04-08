@extends('layouts.main')
@section('title', 'Mi Carrito')
@section('mainApp', 'vestuario')
@section('main')
<div class="container h80">
    @guest
        <div class="alert alert-info text-center w-100 py-4">
            <span>Para confirmar su compra necesita estar logueado.</span>
        </div>
    @endguest
    <h1 class="text-center mb-4">Mi Carrito</h1>
    @if(Session::has('carrito'))
        <div class="row w-100">
            <div class="col-lg-12 border-0">
                <ul class="list-group">
                    @foreach($pelotas as $pelota)
                        <li class="list-group-item border-bottom-1 bg-light d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{route('tienda.reduceByOne', ['id' => $pelota['item']['id']])}}" role="button" class="btn btn-danger"><i class="fas fa-minus"></i><span class="sr-only">Quitar Uno</span></a>
                                <span class="px-2 px-md-4 text-primary">{{$pelota['cantidad']}}</span>
                                <a href="{{route('tienda.addByOne', ['id' => $pelota['item']['id']])}}" role="button" class="btn btn-success"><i class="fas fa-plus"></i><span class="sr-only">Añadir una</span></a>
                            </div>
                            <strong class="h5 mb-0">{{ $pelota['item']['nombre'] }}</strong>
                            <span class="h5 mb-0 label label-success">${{  number_format($pelota['precio'],0,'','.') }}</span>
                            <div class="d-flex">
                                <a href="{{route('tienda.removePelota',['id'=> $pelota['item']['id']])}}" role="button" class="btn btn-danger"><i class="fas fa-trash"></i><span class="sr-only">Quitar todas estas pelotas</span></a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-12">
                <hr>
                <p class="h5 text-right"><strong>Total: ${{ number_format($precioTotal,0,'','.') }}</strong></p>
            </div>
            <div class="col-lg-12">
                <a href="{{route('tienda.checkout')}}" role="button" class="btn btn-success float-right">Pagar</a>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-8">
                <strong>No hay items en elcarrito</strong>
            </div>
        </div>
    @endif
</div>
@endsection
