<?php
/* @var \App\Models\Usuario[]|\Illuminate\Database\Eloquent\Collection $usuario */
?>
@extends('layouts.main')
@section('title', 'Editar Perfil')
@section('mainApp', 'editar-perfil')
@section('main')
    <div class="h80">
        <div class="container">
            <h1 class="text-center">Editar datos de mi perfil</h1>
            <p>Llená los datos para modificar tu perfil</p>
            <form action="{{ route('perfil.editar', ['usuario' => $usuario->usuario_id]) }}" method="post" class="row">
                @csrf
                @method('PUT')
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control" value="{{old('nombre', $usuario->nombre)}}" @error('nombre') aria-describedby="error-nombre" @enderror>
                        @error('nombre')
                        <div class="alert alert-danger" id="error-nombre">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" id="email" name="email" class="form-control" value="{{old('email', $usuario->email)}}" @error('email') aria-describedby="error-email" @enderror>
                        @error('email')
                        <div class="alert alert-danger" id="error-email">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="direction">Dirección</label>
                        <input type="text" id="direction" name="direction" class="form-control" value="{{old('direction', $usuario->direction)}}" @error('direction') aria-describedby="error-direction" @enderror>
                        @error('direction')
                        <div class="alert alert-danger" id="error-direction">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fecha_nacimiento">Fecha de nacimiento</label>
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="{{(old('fecha_nacimiento', $usuario->fecha_nacimiento))}}" @error('fecha_nacimiento') aria-describedby="error-fecha_nacimiento" @enderror>
                        @error('fecha_nacimiento')
                        <div class="alert alert-danger" id="error-fecha_nacimiento">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tel">Número de teléfono</label>
                        <input type="number" id="tel" name="tel" class="form-control" value="{{old('tel', $usuario->tel)}}" @error('tel') aria-describedby="error-tel" @enderror>
                        @error('tel')
                        <div class="alert alert-danger" id="error-tel">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group float-sm-right">
                        <button type="submit" class="btn btn-primary">Confirmar edición</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
