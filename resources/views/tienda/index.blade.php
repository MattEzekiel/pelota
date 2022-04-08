<?php
/* @var \App\Models\Tienda[]|\Illuminate\Database\Eloquent\Collection $pelotas */
/* @var array $formParams */
?>
{{--Por qué haria otra pantalla de detalle del producto si ya toda la información está reflejada ahi? Es un paso más innecesario para el usuario. En comparación el admin, no puede ver toda la información cargada comparado con el usuario.--}}
@extends('layouts.main')
@section('title', 'Fua el Diego: Tienda')
@section('mainApp', 'tienda')
@section('main')
    <div class="container">
        <h1 class="mt-5">Pelotas de Maradona</h1>
        <p><em>Fua el Diego</em></p>
        <div class="mt-3 mb-4">
            <form action="{{route('tienda.index')}}" method="get" class="w-50">
                <div class="form-group">
                    <label for="nombre">Buscar el nombre de la pelota</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" value="{{$formParams['nombre'] ?? null}}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                </div>
            </form>
        </div>
        <div class="row">
            @forelse($pelotas as $pelota)
                <div class="col-md-4 mb-5">
                    <h2><span class="sr-only">Nombre de la pelota</span> {{$pelota->nombre}}</h2>
                    <p>Fecha del torneo {{$fecha = date("d/m/Y",strtotime($pelota->fecha))}}</p>
                    <div class="text-center pelota">
                        @if(\Illuminate\Support\Facades\Storage::disk('public')->exists($pelota->imagen))
                            <img src="{{ asset( 'storage/' . $pelota->imagen )}}" alt="Portada de {{$pelota->nombre}}">
                        @elseif(isset($pelota->imagen))
                            <img src="imgs/pelotas/{{$pelota->imagen}}" alt="Portada de {{$pelota->nombre}}">
                        @else
                            <img src="imgs/pelota-generica.jpg" alt="Pelota autografiada por Maradona">
                        @endif
                    </div>
                    <p class="h3 text-center mt-3"><span class="sr-only">Nombre del mundial o torneo donde se utilizó esta pelota</span>
                        @if($pelota->mundial !== null)
                            {{$pelota->mundial->nombre}}
                        @elseif($pelota->torneos !== null)
                            {{$pelota->torneos->nombre}}
                        @else
                            Torneo Nacional
                        @endif</p>
                    <ul class="list-unstyled">
                        <li class="py-sm-3"><span class="sr-only">Descripción de la pelota: </span>{{$pelota->historia}}</li>
                        <li class="bg-success text-center text-white p-2 radio-20 w-50 m-auto"><span class="sr-only">precio: </span>$ {{number_format($pelota->precio,0,'','.')}}</li>
                        <li>
                            <a class="btn btn-info btn-block my-3" href="{{route('tienda.detalle', ['pelota' => $pelota->id])}}">Ver Detalle</a>
                        </li>
                        <li><a class="text-decoration-none btn btn-success btn-block" role="button" href="{{route('tienda.carrito', ['id' => $pelota->id])}}">Agregar al carrito</a></li>
                    </ul>
                </div>
            @empty
                <h2 class="text-center my-5">No hay Pelotas con ese nombre</h2>
            @endforelse
        </div>
    </div>
@endsection
