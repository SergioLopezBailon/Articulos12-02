@extends('plantillas.plantilla')
@section('titulo')
    Articulos
@endsection
@section('cabecera')
    Articulos Disponibles
@endsection
@section('contenido')
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $miError)
            <li>{{$miError}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form name="c" class="mt-3" method='POST' action="{{route('articulos.update',$articulo)}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-row">
      <div class="col">
        <input type="text" class="form-control" value="{{$articulo->nombre}}" name='nombre' required>
      </div>
      <div class="col">
          <select name="categoria" class="form-control">
            @foreach ($categorias as $item)
                @if ($articulo->categoria==$item)
                    <option value="{{$item}}" selected>{{$item}}</option>
                @else
                <option value="{{$item}}">{{$item}}</option>
                @endif
            @endforeach
          </select> 
      </div>
    </div>
    <div class="form-row mt-3">
        <div class="col">
        <input type="number" class="form-control" value="{{$articulo->precio}}" name='precio' step="0.01" min="0" required>
        </div>
        <div class="col">
          <input type="number" class="form-control" value="{{$articulo->precio}}" name='stock' min="1">
        </div>
    </div>
      <div class="form-row mt-3">
        <div class="col">
            <b>Imagen</b>&nbsp;<input type='file' name='foto' accept="image/*">
        </div>
      </div>
    <div class="form-row mt-3">
        <div class="col">
            <input type='submit' value='Guardar' class='btn btn-success mr-3'>
            <input type='reset' value='Limpiar' class='btn btn-warning mr-3'>
            <a href={{route('articulos.index')}} class='btn btn-info'>Volver</a>
        </div>
    </div>
  </form>
@endsection