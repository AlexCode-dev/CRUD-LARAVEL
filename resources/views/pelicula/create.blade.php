<!-- Formulario de creacion de peliculas -->
<!--El enctype multipart/form-data sirve para enviar fotos o archivos -->
@extends('layouts.app')

@section('content')
<div class="container">
<form action="/pelicula/create" method ="post" enctype="multipart/form-data">
    @csrf
    @include('pelicula.form',['modo'=>'Crear'])
</form>
</div>
@endsection