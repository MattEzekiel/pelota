<?php
/* @var \App\Models\Torneo[]|\Illuminate\Database\Eloquent\Collection $torneos */
?>
@extends('layouts.main')
@section('title', 'Fua el Diego: Sus Torneos')
@section('mainApp', 'torneos')
@section('main')
    <div class="container" style="box-shadow: none">
        <h1 class="mt-5">Torneos de Maradona</h1>
        <p><em>Fua el Diego</em></p>
        @foreach($torneos as $torneo)
            <article class="mt-5">
                <div class="text-center">
                    <img src="imgs/torneos/{{$torneo->img}}" alt="{{$torneo->alt}}">
                </div>
                <h2>{{$torneo->nombre}}</h2>
                <p>{{$torneo->description}}</p>
                <p class="badge badge-primary">Fecha del torneo: {{date('d/m/Y',strtotime($torneo->year))}}</p>
                <hr>
            </article>
        @endforeach
        {{--Paginación--}}
        {{$torneos->links()}}
    </div>
@endsection
