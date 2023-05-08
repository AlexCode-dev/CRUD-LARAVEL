<!-- Editar -->
@extends('layouts.app')

@section('content')
<div class="container">
<form method="post" action="{{ url('/actor/'.$actor->id.'/edit') }}" enctype="multipart/form-data">
@csrf
<!-- lo mismo que lo que paso en DELETE, Si nos fijamos la route list veremos que usa PATCH PARA ENVIAR LOS DATOS -->
{{method_field('PUT')}}
<!-- 
ese 'modo' que añadi es una forma de pasar informacion mediante inclusion -->
@include('actor.form',['modo'=>'Editar'])
</form>
</div>
@endsection