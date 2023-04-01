@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{url('/abarrotestienda/'.$abarrote->id)}}" method="post" enctype="multipart/form-data">
@csrf
{{method_field('PATCH')}}
@include('abarrotestienda.form',['modo'=>'Editar']);
</form>
@endsection 