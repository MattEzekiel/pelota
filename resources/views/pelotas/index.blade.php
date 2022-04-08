<?php
/* @var \App\Models\Pelota[]|\Illuminate\Database\Eloquent\Collection $pelotas */
/* @var array $formParams */
?>
@extends('layouts.main')
@section('title', 'Fua el Diego: Crear Pelotas')
@section('mainApp', 'pelota')
@section('main')
    <h1 class="sr-only">Panel de Pelotas</h1>
   <div class="container">
       @auth()
           <div class="mt-3 mb-4">
               <h2>Buscar nombre de la pelota</h2>
               <form action="{{route('pelotas.index')}}" method="get" class="w-100">
                   <div class="form-group w-75">
                       <label for="nombre">Ingrese el nombre de la pelota</label>
                       <input type="text" id="nombre" name="nombre" class="form-control" value="{{$formParams['nombre'] ?? null}}">
                   </div>
                   <div class="form-group w-25">
                       <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                   </div>
               </form>
           </div>
           <a href="{{route('pelotas.ordenes')}}" class="btn btn-primary mb-3">Ver órdenes de compra</a>
           <a href="<?= url('/pelotas/nueva') ;?>" class="btn btn-primary mb-3 float-md-right">Cargar una nueva pelota</a>
       @endauth
       <div class="table-responsive">
        <table class="table-striped table table-bordered">
           <thead class="thead-dark">
           <tr  class="text-center">
               <th scope="col">ID</th>
               <th scope="col">Nombre</th>
               <th scope="col">Fecha</th>
               <th scope="col">Historia</th>
               <th scope="col">Torneo/Mundial</th>
               <th scope="col">Precio</th>
               <th scope="col">Acciones</th>
           </tr>
           </thead>
           <tbody>
           @forelse($pelotas as $pelota)
               <tr @if($pelota->trashed()) class="bg-alert text-alert-danger" @endif>
                   <th scope="row">{{$pelota['id']}}</th>
                   <td><strong>{{$pelota->nombre}}</strong></td>
                   <td>{{$fecha = date("d/m/Y",strtotime($pelota->fecha))}}</td>
                   <td class="text-left">{{$pelota->historia}}</td>
                   <td>
                       @if($pelota->mundial !== null)
                           {{$pelota->mundial->nombre}}
                       @elseif($pelota->torneos !== null)
                           {{$pelota->torneos->nombre}}
                       @else
                           Torneo Nacional
                       @endif
                   </td>
                   <td><span class="badge badge-success">$ {{number_format($pelota->precio,0,'','.')}}</span></td>
                   <td class="text-center">
                       <a class="btn btn-info" href="{{route('pelotas.ver', ['pelota' => $pelota->id])}}">Ver Detalle</a>
                       @auth()
                           <a href="{{ route('pelotas.editarForm', ['pelota' => $pelota->id]) }}" class="btn btn-warning mt-2">
                               @if($pelota->trashed()) Editar / Restaurar
                               @else Editar
                               @endif
                           </a>
                       @endauth
                   </td>
               </tr>
           @empty
               <tr>
                   <td class="bg-info text-center text-white font-weight-bold h2" colspan="7">La pelota que está buscando no existe</td>
               </tr>
           @endforelse
           </tbody>
       </table>
       </div>
       {{--Paginación--}}
       {{$pelotas->links()}}
   </div>
@endsection
