@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ url('/abarrotestienda') }}" method="post">
@csrf 
@include('abarrotestienda.form',['modo'=>'Crear']);
</form>
@endsection