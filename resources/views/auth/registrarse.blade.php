@extends('layouts.main')
@section('title', 'Fua el Diego: Registrarse')
@section('mainApp', 'registrarse')
@section('main')
    <div class="h80">
        <h1 class="text-center mt-5">Registrarse</h1>
        <p class="text-center"><em>Fua el diego</em></p>
        <form id="registro" action="{{ route('auth.registrarse') }}" method="post" class="mx-auto w-75">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nombre">Ingrese su nombre<sup class="text-danger">*</sup></label>
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre Completo" value="{{ old('nombre','') }}" required @error('nombre') aria-describedby="error-nombre" @enderror>
                        @error('nombre')
                        <div class="alert alert-danger" id="error-nombre">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Ingrese su email<sup class="text-danger">*</sup></label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@ejemplo.com" value="{{ old('email','') }}" required @error('email') aria-describedby="error-email" @enderror>
                        @error('email')
                        <div class="alert alert-danger" id="error-email">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="password">Ingrese su contraseña<sup class="text-danger">*</sup></label>
                        <div id="show_hide_password" class="input-group">
                            <input type="password" id="password" name="password" class="form-control" required placeholder="Contraseña" @error('password') aria-describedby="error-password" @enderror>
                            <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        @error('password')
                        <div class="alert alert-danger" id="error-password">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="direction">Ingrese su dirección</label>
                        <input type="text" id="direction" name="direction" class="form-control" placeholder="Dirección 1324" @error('direction') aria-describedby="error-direction" value="{{ old('direction','') }}" @enderror>
                        @error('direction')
                        <div class="alert alert-danger" id="error-direction">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="edad">Ingrese su año de nacimiento</label>
                        <input type="date" id="edad" name="edad" class="form-control" value="{{ old('edad','') }}" @error('edad') aria-describedby="error-edad" @enderror>
                        @error('edad')
                            <div class="alert alert-danger" id="error-edad">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tel">Ingrese su teléfono</label>
                        <input type="tel" id="tel" name="tel" class="form-control" placeholder="+5491100000001" value="{{ old('tel','') }}" @error('tel') aria-describedby="error-tel" @enderror>
                        @error('tel')
                            <div class="alert alert-danger" id="error-tel">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group mt-lg-5">
                        <button id="sign-in" type="submit" class="btn btn-primary float-right">Registrarse</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if($('#show_hide_password input').attr("type") === "text"){
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password a').html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
                }else if($('#show_hide_password input').attr("type") === "password"){
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password a').html('<i class="fa fa-eye" aria-hidden="true"></i>');
                }
            });
        });
    </script>
    <script>
        $('#sign-in').click(function (event) {
            event.preventDefault();
            if($('#show_hide_password input').attr("type") === "text"){
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password a').html('<i class="fa fa-eye-slash" aria-hidden="true"></i>');
            }
            $('#registro').submit();
        })
    </script>
@endpush
