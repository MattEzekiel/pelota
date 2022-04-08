@extends('layouts.main')
@section('title', 'Fua el Diego')
@section('mainApp', 'principal')
@section('main')
    <div class="container" style="box-shadow: none">
        <h1 class="mt-4">Pelotas de Maradona</h1>
        <p><em>Fua el Diego</em></p>
        <section>
            <div class="row">
                <div class="col-lg-6">
                    <figure>
                        <img src="imgs/el-diego-copa.jpg" alt="El diego sosteniendo la copa del mundo">
                        <figcaption class="text-center"><em>Maradona ganador de la copa del mundo 1986</em></figcaption>
                    </figure>
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-3">La pelota no se mancha, tributo al DIEGO</h2>
                    <p>En esta página hacemos un pequeño recorrido de la trayectoria de <strong>Diego Armando Maradona</strong> jugador y <abbr title="Director Técnico">DT</abbr> de la selección argentina de futbol</p>
                </div>
            </div>
            <div class="mt-3 mt-md-5 row flex-md-row reversear flex-column-reverse">
                <div class="col-lg-6">
                    <h2>Maradona Eterno</h2>
                    <p>El de Patria es un concepto difuso. Es la tierra en la que uno nace, sí, pero también es la gente que allí vive. Es su historia, pero también su futuro. Es la virtud y el defecto. Es la familia y son los amigos. Es el pueblo y con él, el antipueblo. Es lo que fuimos y lo que podríamos haber sido. Es el héroe y el villano. O quizás no es nada de eso y es lo que a cada uno de sus hijos le pase por el alma, el corazón y la razón. Hoy, el pueblo argentino solo tiene pena. Y por eso, la Patria es Diego Armando Maradona.</p>
                </div>
                <div class="col-lg-6" data-wow-delay="2s">
                    <figure class="text-center">
                        <img class="m-auto" src="imgs/diego-pelota-cabeza.jpg" alt="Diego Maradona 1960 a 2020">
                    </figure>
                </div>
            </div>
        </section>
        <section class="bg-celeste p-3">
            <h2 class="text-center">Visitá nuestra tienda online</h2>
            <p class="text-center">Pelotas autografiadas por el astro del fútbol argentino</p>
            <p class="text-center"><a href="<?= url('/tienda') ;?>" class="btn btn-outline-light">ir a la tienda</a></p>
        </section>
        <section class="mt-5">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-center">Sobre Nosotros</h2>
                    <p>Somos una pequeña empresa que coordinaba eventos donde participaron grandes estrellas del fútbol. Una de ellas fue <strong class="text-capitalize">Diego armando Maradona</strong>, donde tuvimos el privilegio de que  nos autografiara varias de sus pelotas que tuvo a sus pies en distintos mundiales y torneos.</p>
                    <p class="mt-3">Tuvimos la suerte de compartir muchos momentos y recuerdos con el <strong>astro del fútbol mundial</strong>; y hoy queremos darle a sus fans la oportunidad de tener uno de sus más preciados objetos. Sus pelotas autografiadas</p>
                </div>
                <div class="col-md-6">
                    <img src="imgs/foto-grupal.jpg" alt="Nuestro equipo junto a Diego Maradona">
                </div>
            </div>
        </section>
        <aside class="bg-celeste p-4 mt-5">
            <h3 class="text-center mt-3">Contactanos</h3>
            <p class="text-center">Escribinos un mensaje para contactarte con nosotros de la manera más sencilla. Te responderemos a la brevedad.</p>
            <form action="{{route('gracias')}}"  method="post">
                @csrf
                <div class="form-group">
                    <label for="nombre">Ingrese su nombre</label>
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese su nombre aquí" required>
                </div>
                <div class="form-group">
                    <label for="email">Ingrese su email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Ingrese su email aquí" required>
                </div>
                <div class="form-group">
                    <label for="mensaje">Escriba su mensaje</label>
                    <textarea name="mensaje" id="mensaje" cols="30" rows="10" class="form-control" placeholder="Su mensaje aquí"></textarea>
                </div>
                <div class="form-group">
                    <button class="btn btn-light btn-block" type="submit">Enviar mensaje</button>
                </div>
            </form>
        </aside>
    </div>
@endsection
