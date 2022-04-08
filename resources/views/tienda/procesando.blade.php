@extends('layouts.main')
@section('title', 'Confirmando compra')
@section('mainApp', 'procesando')
@section('main')
    <div class="h80">
        <h1 class="text-center mt-5">Confirmando compra</h1>
        <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
        <div class="row w-100">
            <div class="col-sm-6 m-auto">
                <form id="formulario" hidden action="{{route('tienda.postCheckout')}}" method="post">
                    @csrf
                    <div class="form-control mt-3 border-0">
                        <label for="nombre">Ingrese su nombre <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required  value="@if(auth()->user())  {{auth()->user()->nombre}} @elseif(old('nombre')) {{old('nombre')}}  @endif" @error('nombre') aria-describedby="error-nombre" @enderror>
                        @error('nombre')
                            <div class="alert alert-danger" id="error-nombre">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-control mt-3 border-0">
                        <label for="email">Ingrese su email <sup class="text-danger">*</sup></label>
                        <input type="email" class="form-control" id="email" name="email" required value="@if(auth()->user())  {{auth()->user()->email}} @elseif(old('email')) {{old('email')}} @endif" @error('email') aria-describedby="error-email" @enderror>
                        @error('email')
                            <div class="alert alert-danger" id="error-email">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-control mt-3 border-0">
                        <label for="direction">Ingrese su dirección <sup class="text-danger">*</sup></label>
                        <input type="text" class="form-control" id="direction" name="direction" required value="@if(auth()->user())  {{auth()->user()->direction}} @elseif(old('direction')) {{('direction')}} @endif" @error('direction') aria-describedby="error-direction" @enderror>
                        @error('direction')
                            <div class="alert alert-danger" id="error-direction">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-control sr-only">
                        <label for="carrito">Pedido</label>
                        <textarea name="carrito" id="carrito" cols="30" rows="10">
                        @foreach($pelotas as $pelota)

                                Pelota: {{$pelota['item']['nombre']}},
                                Cantidad de Pelotas: {{$pelota['cantidad']}},

                            @endforeach
                    </textarea>
                        @error('carrito')
                            <div class="alert alert-danger" id="error-carrito">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-control sr-only">
                        <label for="total">Total a pagar</label>
                        <input type="number" id="total" name="total" value="{{$total}}">
                        @error('total')
                            <div class="alert alert-danger" id="error-total">{{$message}}</div>
                        @enderror
                    </div>
                    @if(auth()->user())
                        <div class="form-control sr-only">
                            <label for="usuario_id">usuario id</label>
                            <input type="hidden" id="usuario_id" name="usuario_id" value="{{auth()->user()->usuario_id}}">
                            @error('usuario_id')
                                <div class="alert alert-danger" id="error-usuario_id">{{$message}}</div>
                            @enderror
                        </div>
                    @endif
{{--                    <div class="form-control mt-4 border-0">--}}
{{--                        <button type="submit" class="btn btn-success">Efectuar pago</button>--}}
{{--                    </div>--}}
                </form>
                <hr>
                <h2 class="text-center">Total a pagar: ${{number_format($total,0,'','.')}}</h2>
                <div class="cho-container"></div>
            </div>
        </div>
    </div>
    @push('js')
        <script>
            $(document).ready(function () {
                $('#formulario').submit();
            })
        </script>
    @endpush
@endsection

