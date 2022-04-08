<?php
/** @var \App\Models\Pelota $pelota */
?>
@extends('layouts.main')
@section('title', $pelota->nombre)
@section('mainApp', 'ver-pelota')
@section('main')
   <div class="container my-5">
       <h1>{{$pelota->nombre}}</h1>
       <p>Fua el Diego</p>
       <div class="mb-5 mt-3">
           <a href="{{route('pelotas.index')}}" class="btn btn-primary">Volver</a>
       </div>
       <div class="table-responsive">
           <table class="table">
               <thead class="thead-dark">
                   <tr>
                       <th scope="col">Precio</th>
                       <th scope="col">Historia</th>
                       <th scope="col">Fecha</th>
                       <th scope="col">Imagen</th>
                   </tr>
               </thead>
               <tbody>
                <tr>
                   <td class="bg-success text-white font-weight-bold">${{number_format($pelota->precio,0,',','.')}}</td>
                   <td class="text-left">{{$pelota->historia}}</td>
                   <td class="bg-info text-white font-weight-bold">{{date("d/m/Y",strtotime($pelota->fecha))}}</td>
                   <td>{{--Imagen--}}
                       @if(\Illuminate\Support\Facades\Storage::disk('public')->exists($pelota->imagen))
                           <img width="300" src="{{ asset( 'storage/' . $pelota->imagen )}}" alt="Portada de {{$pelota->nombre}}">
                       @else
                           <img width="300" src="../imgs/pelotas/{{$pelota->imagen}}" alt="{{$pelota->nombre}}">
                       @endif
                   </td>
                </tr>
               </tbody>
           </table>
       </div>
       @if($pelota->trashed())
           <form action="{{ route('pelotas.restaurar', ['pelota' => $pelota->id]) }}"  method="post">
               @csrf
               @method('PUT')
               @auth()
                   <button class="btn btn-success">Restaurar</button>
               @endauth
           </form>
       @else
           <form action="{{ route('pelotas.eliminar', ['pelota' => $pelota->id]) }}"  method="post">
               @csrf
               @method('DELETE')
               @auth()
                   <button class="btn btn-danger">Eliminar</button>
               @endauth
           </form>
       @endif
   </div>
@endsection
