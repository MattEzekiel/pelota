<?php
/**
* @var \Illuminate\Support\ViewErrorBag|\Illuminate\Support\MessageBag $errors
 * @var \App\Models\Pelota $pelota
 **/
?>
@extends('layouts.main')
@section('title', 'Fua el Diego: Editar Pelota')
@section('mainApp', 'pelota-edit')
@section('main')
    <div class="container my-5">
        <h1>Editá una pelota del Diego</h1>
        <p>Fua el Diego</p>
        <div class="mb-5 mt-3">
            <a href="{{route('pelotas.index')}}" class="btn btn-primary">Volver</a>
        </div>
        <p>Completá el formulario</p>
        <form action="{{ route('pelotas.editar', ['pelota' => $pelota->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre',$pelota->nombre) }}" @error('nombre') aria-describedby="error-nombre" @enderror>
                @error('nombre')
                <div class="alert alert-danger text-center" id="error-nombre">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio',$pelota->precio) }}"  @error('precio') aria-describedby="error-precio" @enderror>
                @error('precio')
                <div class="alert alert-danger text-center" id="error-precio">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="form-control @error('fecha') is-invalid @enderror"  value="{{ old('fecha',$pelota->fecha) }}" @error('fecha') aria-describedby="error-fecha" @enderror>
                @error('fecha')
                <div class="alert alert-danger text-center" id="error-fecha">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="historia">Historia</label>
                <textarea id="historia" name="historia" class="form-control @error('historia') is-invalid @enderror" @error('historia') aria-describedby="error-historia" @enderror>{{ old('historia',$pelota->historia) }}</textarea>
                @error('historia')
                <div class="alert alert-danger text-center" id="error-historia">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="imagen">Adjunte una imagen</label>
                <input type="file" name="imagen" id="imagen" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-block btn-primary">Editar</button>
        </form>
    </div>
@endsection
