@extends('layouts.app')

@section('content')
        @if(Session::has('mensaje'))
            {{ Session::get('mensaje') }}
        @endif
      


<a href="{{ url ('/abarrotestienda/create') }}" class="btn btn-success">Registrar producto</a>
<table class="table table-ligh">
    <thead class="thead-ligh">
        <tr>
            <th>#</th>
            <th>Nombre del producto</th>
            <th>Descripcion del producto</th>
            <th>Precio del producto</th>
        </tr>
    </thead>
    <tbody> @foreach ($abarrotes as $abarrote) 
        
       <tr>
        <td>{{$abarrote->id}}</td>
        <td>{{$abarrote->producto}}</td>
        <td>{{$abarrote->descripcion}}</td>
        <td>{{$abarrote->precio}}</td>
        <td>Editar registro |  


            <a href="{{ url('/abarrotestienda/'.$abarrote->id.'/edit') }}" class="btn btn-warning">Editar</a>

            <form action="{{url('/abarrotestienda/'.$abarrote->id)}}" class="d-inline" method="post">
            @csrf 
            {{method_field('DELETE')}}
            <input class="btn btn-danger"type="submit" onclick="return confirm ('Desea borrar:')" value="Borrar">
            </form>
        </td>
       </tr>
    </tbody>
       @endforeach
 @endsection      

