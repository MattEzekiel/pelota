<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','Las pelotas del Diego')</title>
    <link rel="icon" type="image/png" href="<?= url('imgs/favicon-32x32.png') ;?>">
    <link rel="stylesheet" href="<?= url('css/all.min.css');?>">
    <link rel="stylesheet" href="<?= url('css/animate.css');?>">
    <link rel="stylesheet" href="<?= url('css/bootstrap.min.css') ;?>">
    <link rel="stylesheet" href="<?= url('css/mdb.min.css');?>">
    <link rel="stylesheet" href="<?= url('css/app.css');?>">
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-celeste">
        <a class="navbar-brand text-white" href="<?= url('/') ;?>">La Pelota no se mancha</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse justify-content-sm-between" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= url('/') ;?>" class="nav-link home <?= url()->current() == url('/') ? 'active' : '';?>"><i class="fab fa-font-awesome-flag"></i> Inicio</a>
                </li>
                <li class="nav-item">
                    <a href="<?= url('/mundiales') ;?>" class="nav-link <?= url()->current() == url('/mundiales') ? 'active' : '';?>"><i class="fas fa-futbol"></i> Mundiales</a>
                </li>
                <li class="nav-item">
                    <a href="<?= url('/torneos') ;?>" class="nav-link <?= url()->current() == url('/torneos') ? 'active' : '';?>"><i class="fas fa-futbol"></i> Torneos</a>
                </li>
                <li class="nav-item">
                    <a href="<?= url('/tienda') ;?>" class="nav-link <?= url()->current() == url('/tienda') ? 'active' : '';?>"><i class="fas fa-store"></i> Tienda</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('tienda.shoppingCarrito')}}" class="nav-link <?= url()->current() == url('/tienda/carrito') ? 'active' : '';?>"><i class="fas fa-shopping-cart"></i><sup class="badge badge-primary">{{ Session::has('carrito') ? Session::get('carrito')->cantidadPelotas : ''}}</sup> Carrito</a>
                </li>
                @if(Auth::check() && Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a href="<?= url('/pelotas') ;?>" class="nav-link <?= url()->current() == url('/pelotas') ? 'active' : '';?> text-danger"><i class="fas fa-pen"></i> ABM de Pelotas</a>
                    </li>
                @endif
            </ul>
                @auth()
                    <span class="navbar-text d-lg-flex">
                         @if(Auth::check() && Auth::user()->role !== 'admin')
                        <a href="<?= url('/perfil') ;?>" class="nav-link <?= url()->current() == url('/perfil') ? 'active' : '';?> p-0 py-2 px-lg-3"><i class="far fa-user"></i> Mi Perfil</a>
                        @endif
                        <a href="<?= url('/logout') ;?>" class="nav-link p-0 py-2 px-lg-3"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
                    </span>
                @endauth
                @guest()
                    <div class="navbar-text nav-item p-0 d-flex flex-column flex-lg-row">
                        <a href="<?= url('/login') ;?>" class="nav-link p-0 py-2 px-lg-3 <?= url()->current() == url('/login') ? 'active' : '';?>"><i class="far fa-user"></i> Iniciar Sesión</a>
                        <a href="<?= url('/registrarse') ;?>" class="nav-link p-0 py-2 px-lg-3 <?= url()->current() == url('/registrarse') ? 'active' : '';?>"><i class="fas fa-users"></i> Registrarse</a>
                    </div>
                @endguest
        </div>
    </nav>
</header>
<main class="container-fluid" id="@yield('mainApp','')">
    @if(Session::has('message'))
        <div class="mt-3 alert alert-{{ Session::get('message_type') ?? 'success' }} text-center">{{ Session::get('message') }}</div>
    @endif
    @yield('main')
</main>
<footer class="footer bg-dark text-center text-lg-start p-5">
    <p class="text-center text-light m-0">Copyright&copy; La Pelota No se Mancha 2021</p>
</footer>
<script src="<?= url('js/jquery-3.2.1.min.js') ;?>"></script>
<script src="<?= url('js/bootstrap.min.js') ;?>"></script>
<script src="<?= url('js/all.min.js');?>"></script>
<script src="<?= url('js/submit.js') ;?>"></script>
@stack('js')
</body>
</html>
