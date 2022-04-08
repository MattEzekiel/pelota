@extends('layouts.main')
@section('title', 'Confirmar Compra')
@section('mainApp', 'checkout')
@php
    // SDK de Mercado Pago
    require base_path('/vendor/autoload.php');
    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    /**
     * @var $total 'String'
     */

    $item = new MercadoPago\Item();
    $item->title = 'Total a pagar';
    $item->quantity = 1;
    $item->unit_price = $total;

    $preference->back_urls = [
        'success' => route('tienda.procesando'),
    ];
    $preference->items = array($item);
    $preference->save();
@endphp
@section('main')
    <div class="h80">
        <h1 class="text-center mt-5">Confirmar compra</h1>
        @guest
            <div class="alert alert-info text-center w-100 py-4">
                <span>Para confirmar su compra necesita estar logueado.</span>
            </div>
        @endguest
        <div class="row w-100">
            <div class="col-sm-6 m-auto">
                <form action="{{route('tienda.postCheckout')}}" method="post">
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

                                Pelota: {{$pelota['item']['nombre']}}
                                Cantidad de Pelotas: {{$pelota['cantidad']}}

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
                <h2>Total a pagar: ${{number_format($total,0,'','.')}}</h2>
                @auth
                    <div class="cho-container"></div>
                @endauth
            </div>
        </div>
    </div>
    @push('js')
        <script src="https://sdk.mercadopago.com/js/v2"></script>
        <script>
            // Agrega credenciales de SDK
            const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
                locale: 'es-AR'
            });

            // Inicializa el checkout
            mp.checkout({
                preference: {
                    id: '{{ $preference->id }}'
                },
                render: {
                    container: '.cho-container', // Indica el nombre de la clase donde se mostrará el botón de pago
                    label: 'Efectuar Pago', // Cambia el texto del botón de pago (opcional)
                }
            });
        </script>
    @endpush
@endsection

