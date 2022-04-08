<?php
/** @var \App\Models\Pelota $pelota */
?>
@extends('layouts.main')
@section('title', 'Detalle: '. $pelota->nombre)
@section('mainApp', 'ver-pelota')
@section('main')
   <article class="container my-5">
       <h1  class="text-center">Vista en detalle</h1>
       <div class="row">
           <div class="col-md-6 m-auto">
                <div class="card">
                    <span class="sr-only">Imagen</span>
                   <picture class="text-center">{{--Imagen--}}
                       @if(\Illuminate\Support\Facades\Storage::disk('public')->exists($pelota->imagen))
                           <img class="m-auto card-img-top" style="max-width: 300px" src="{{ asset( 'storage/' . $pelota->imagen )}}" alt="Portada de {{$pelota->nombre}}">
                       @else
                           <img class="m-auto card-img-top" style="max-width: 300px" src="../imgs/pelotas/{{$pelota->imagen}}" alt="{{$pelota->nombre}}">
                       @endif
                   </picture>
                   <div class="card-body">
                       <h2 class="text-center card-title">{{$pelota->nombre}}</h2>
                    <span class="sr-only">Precio</span>
                    <p class="bg-success text-white text-center radio-20">${{number_format($pelota->precio,0,',','.')}}</p>
                       <span class="sr-only">Historia</span>
                       <p>{{$pelota->historia}}</p>
                       <span class="sr-only">Fecha</span>
                       <p class="text-center card-subtitle">{{date("d/m/Y",strtotime($pelota->fecha))}}</p>
                       <p><a class="text-decoration-none mt-4 btn btn-success btn-block" role="button" href="{{route('tienda.carrito', ['id' => $pelota->id])}}">Agregar al carrito</a></p>
           </div>
       </div>
           </div>
       </div>
   </article>
@endsection
