<!-- Formulario de creacion de peliculas -->
<!--El enctype multipart/form-data sirve para enviar fotos o archivos -->
@extends('layouts.app')

@section('content')
<div class="container">
<form action="/actor/create" method ="post" enctype="multipart/form-data">
    @csrf
    @include('actor.form',['modo'=>'Crear'])
</form>
</div>
@endsection