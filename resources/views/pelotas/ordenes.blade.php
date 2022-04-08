@extends('layouts.main')
@section('title', 'Ordenes')
@section('mainApp', 'ordenes')
@section('main')
    <div class="container">
        <h1 class="text-center mt-5 mb-4">Ordenes</h1>
        <a href="{{route('pelotas.index')}}" class="btn btn-primary mb-3">Ver pelotas</a>
        <a href="<?= url('/pelotas/nueva') ;?>" class="btn btn-primary mb-3 float-right">Cargar una nueva pelota</a>
        <div id="stats">
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="icon-stat">
                                <div class="row">
                                    <div class="col-sm-8 text-left">
                                        <span class="icon-stat-label">Ganancias Totales</span>
                                        <span class="icon-stat-value">${{number_format($totalVentas,0,'.',',')}}</span>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <i class="fa fa-dollar-sign icon-stat-visual bg-success text-white"></i>
                                    </div>
                                </div>
                                <div class="icon-stat-footer">
                                    <a href="{{route('pelotas.ordenes')}}"><i class="far fa-clock"></i> Actualizar ahora</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="icon-stat">
                                <div class="row">
                                    <div class="col-sm-8 text-left">
                                        <span class="icon-stat-label">Cantidad de Ventas</span>
                                        <span class="icon-stat-value">{{$cantidadVentas}}</span>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <i class="fas fa-chart-line icon-stat-visual bg-primary"></i>
                                    </div>
                                </div>
                                <div class="icon-stat-footer">
                                    <a href="{{route('pelotas.ordenes')}}"><i class="far fa-clock"></i> Actualizar ahora</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="icon-stat">
                                <div class="row">
                                    <div class="col-sm-8 text-left">
                                        <span class="icon-stat-label">Ganancias de hoy</span>
                                        <span class="icon-stat-value">${{number_format($totalVentasHoy,0,'.',',')}}</span>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <i class="fa fa-dollar-sign icon-stat-visual bg-success text-white"></i>
                                    </div>
                                </div>
                                <div class="icon-stat-footer">
                                    <a href="{{route('pelotas.ordenes')}}"><i class="far fa-clock"></i> Actualizar ahora</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="icon-stat">
                                <div class="row">
                                    <div class="col-sm-8 text-left">
                                        <span class="icon-stat-label">Cantidad de ventas hoy</span>
                                        <span class="icon-stat-value">{{$cantidadVentasHoy}}</span>
                                    </div>
                                    <div class="col-sm-4 text-center">
                                        <i class="fas fa-cart-arrow-down icon-stat-visual bg-secondary"></i>
                                    </div>
                                </div>
                                <div class="icon-stat-footer">
                                    <a href="{{route('pelotas.ordenes')}}"><i class="far fa-clock"></i> Actualizar ahora</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive m-auto">
            <table class="table table-bordered table-primary mb-5 mx-sm-auto">
                <thead class="thead-dark">
                <tr>
                    <th>Número de pedido</th>
                    <th>Pedido</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Total pagado</th>
                </tr>
                </thead>
                <tbody>
                @foreach($ordenes as $orden)
                    <tr>
                        <td>{{$orden->orden_id}}</td>
                        <td class="text-left">{{$orden->carrito}}</td>
                        <td class="text-capitalize">{{$orden->nombre}}</td>
                        <td>{{$orden->email}}</td>
                        <td>{{$orden->direction}}</td>
                        @if($orden->tel == null)
                            <td>No hay datos de teléfono</td>
                        @else
                        <td>{{$orden->tel}}</td>
                        @endif
                        <td>${{number_format($orden->total,0,'.',',')}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{$ordenes->links()}}
        </div>
    </div>
@endsection
