<?php
/* @var \App\Models\Mundial[]|\Illuminate\Database\Eloquent\Collection $mundiales */
?>
@extends('layouts.main')
@section('title', 'Fua el Diego: Sus Mundiales')
@section('mainApp', 'mundial')
@section('main')
    <div class="container" style="box-shadow: none">
        <h1 class="mt-5">Mundiales de Maradona</h1>
        <p><em>Fua el Diego</em></p>
        @foreach($mundiales as $mundial)
            <article class="mt-5">
                <div class="text-center">
                    <img src="imgs/mundiales/{{$mundial->img}}" alt="{{$mundial->alt}}">
                </div>
                <h2>{{$mundial->nombre}}</h2>
                <p>{{$mundial->description}}</p>
                <p class="badge badge-primary">{{date('d/m/Y',strtotime($mundial->year))}}</p>
                <hr>
            </article>
        @endforeach
    </div>
@endsection
