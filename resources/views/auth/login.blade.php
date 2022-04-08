@extends('layouts.main')
@section('title', 'Fua el Diego: Iniciar Sesión')
@section('mainApp', 'login')
@section('main')
<div class="h80">
    <h1 class="text-center mt-5">Iniciar Sesión</h1>
    <p class="text-center"><em>Fua el diego</em></p>
    <form action="{{ route('auth.login') }}" method="post" class="mx-auto w-75">
        @csrf
        <div class="form-group">
            <label for="email">Ingrese su email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@ejemplo.com">
        </div>
        <div class="form-group">
            <label for="password">Ingrese su Contraseña</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-primary">Ingresar</button>
        </div>
    </form>
</div>
@endsection
