@extends('plantillas.plantilla')
@section('titulo')
    Detalle Articulo
@endsection
@section('cabecera')
    Detalles Articulo Nombre <i><b>{{($articulo->nombre)}}</b></i>

@endsection
@section('contenido')
    <span class="clearfix"></span>
    <div class="card text-white bg-info mt-5 mx-auto" style="max-width: 48rem;">
        <div class="card-header text-center"><b>{{($articulo->id)}}</b></div>
        <div class="card-body" style="font-size: 1.1em">
            <p class="card-text">
            <div class="float-right"><img src="{{asset($articulo->imagen)}}" width="160px" heght="160px" class="rounded-circle"></div>
            <p><b>Nombre:</b> {{$articulo->nombre}}</p>
            <p><b>Categoria:</b> {{$articulo->categoria}}</p>
            <p><b>Precio (€):</b> {{$articulo->precio}}</p>
            <p><b>Stock:</> {{$articulo->stock}}</p>
            </p>
            <a href="{{route('articulos.index')}}" class="float-right btn btn-success">Volver</a>
        </div>
    </div>



@endsection
