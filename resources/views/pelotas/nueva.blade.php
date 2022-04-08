<?php
/**
@var \Illuminate\Database\Eloquent\Collection|\App\Models\Torneo[] $torneos
@var \Illuminate\Database\Eloquent\Collection|\App\Models\Mundial[] $mundial
@var \Illuminate\Support\ViewErrorBag|\Illuminate\Support\MessageBag $errors
 **/
?>
@extends('layouts.main')
@section('title', 'Fua el Diego: Crear Pelota')
@section('mainApp', 'nueva-pelota')
@section('main')
    <div class="container my-5">
        <h1>Subí una pelota del Diego</h1>
        <p><em>Fua el Diego</em></p>
        <p>Completá el formulario</p>
        <form action="{{route('pelotas.crear')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre">Nombre de la pelota</label>
                <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre','') }}" @error('nombre') aria-describedby="error-nombre" @enderror>
                <small>Mínimo 4 caracteres</small>
                @error('nombre')
                <div class="alert alert-danger text-center" id="error-nombre">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="precio">Precio de la pelota</label>
                <input type="number" id="precio" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio','') }}"  @error('precio') aria-describedby="error-precio" @enderror>
                @error('precio')
                <div class="alert alert-danger text-center" id="error-precio">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="fecha">Fecha del torneo donde se utilizó la pelota</label>
                <input type="date" id="fecha" name="fecha" class="form-control @error('fecha') is-invalid @enderror"  value="{{ old('fecha','') }}" @error('fecha') aria-describedby="error-fecha" @enderror>
                @error('fecha')
                <div class="alert alert-danger text-center" id="error-fecha">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="historia">Ingrese la historia de la pelota</label>
                <textarea id="historia" name="historia" class="form-control @error('historia') is-invalid @enderror" @error('historia') aria-describedby="error-historia" @enderror>{{ old('historia','') }}</textarea>
                <small>Mínimo 10 caracteres</small>
                @error('historia')
                <div class="alert alert-danger text-center" id="error-historia">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="imagen">Adjunte una imagen de la pelota</label>
                <input type="file" name="imagen" id="imagen" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-block btn-primary">Crear</button>
        </form>
    </div>
@endsection
