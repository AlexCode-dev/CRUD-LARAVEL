<!--Mostrar listado peliculas--->

@extends('layouts.app')

@section('content')
<div class="container">
     <div class="album py-5 bg-light">
@foreach ($peliculas as $pelicula)
    <img src="{{ asset('storage').'/'.$pelicula->imagen }}" width="400px">
    
@endforeach

</div>
@endsection