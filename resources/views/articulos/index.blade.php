@extends('plantillas.plantilla')
@section('titulo')
    Articulos
@endsection
@section('cabecera')
    Articulos Disponibles
@endsection
@section('contenido')
@if ($texto=Session::get('mensaje'))
  <p class="alert alert-success">{{$texto}}</p>
@endif
<a href="{{route('articulos.create')}}" class="btn btn-success mb-3">Nuevo Articulo</a>
<form action="{{route('articulos.index')}}" class="form-inline float-right">
  <select name="precio" class="form-control" onchange="this.form.submit()">
    <option value="%">Todos</option>
    <option value="1">0-50€</option>
    <option value="2">50-200€</option>
    <option value="3">200-500€</option>
    <option value="4">500-1000€</option>
  </select>
  <select name="categoria" class="form-control" onchange="this.form.submit()">
    <option value="%">Todos</option>
    @foreach ($categorias as $item)
      @if ($item==$request->categoria)
      <option value="{{$item}}" selected>{{$item}}</option>    
      @else
      <option value="{{$item}}">{{$item}}</option>
      @endif
    @endforeach
  </select>
  <input type="submit" class="btn btn-primary" value="Buscar">
</form>
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID</th>
        <th scope="col">Nombre</th>
        <th scope="col">Categoria</th>
        <th scope="col">Precio</th>
        <th scope="col">Stock</th>
        <th scope="col">Imagen</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($articulos as $item)
      <tr>
      <th scope="row"><a href="{{route('articulos.show',$item)}}" class="btn btn-info">Detalles</a></th>
          <th scope="row">{{$item->id}}</th>
          <td>{{$item->nombre}}</td>
          <td>{{$item->categoria}}</td>
          <td>{{$item->precio}}</td>
          <td>{{$item->stock}}</td>
          <td><img src="{{asset($item->imagen)}}" width="90px" height="90px" class="rounded-circle"></td>
          <td>
          <form action="{{route('articulos.destroy',$item)}}" method="POST" name="b">
              @method('DELETE')
              @csrf
              <input type="submit" class="btn btn-danger" value="Borrar">
              <a href="{{route('articulos.edit',$item)}}" class="btn btn-warning">Editar</a>
            </form>
          </td>
      </tr>      
  @endforeach
      
    </tbody>
  </table>
  {{$articulos->appends(Request::except('page'))->links()}}
@endsection