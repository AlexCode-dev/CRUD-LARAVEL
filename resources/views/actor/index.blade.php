
@extends('layouts.app')

@section('content')
<div class="container">
<!-- Creamos las rutas que nos lleve a la ruta create -->
<a href="{{url('actor/create')}}" class="btn btn-dark">REGISTRAR NUEVO ACTOR AJAX</a>
<br/>
<br/>
<table class="table">
  <thead class="table table-dark">
    <tr>
      <th scope="col">#</th> <!--ID-->
      <th scope="col">Nombre</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
   <!-- recorremos la variable que pusimos en el index -->
  @foreach($actores as $actor)
  
    <tr>
      <th scope="row">{{ $actor->id }}</th>
      <td>{{ $actor->name }}</td>
   
      <td>
        <!--Editar. Enviamos el id en la url ()-->
    
        <a href="{{url('/actor/'.$actor->id.'/edit')}}" class="btn btn-warning" style="width: 100%;  color:#fff;">Editar</a>

        <br>
        <br>
        <form method="post" action="{{ url('/actor/'.$actor->id) }}" class="d-inline">
        @csrf <!--llave necesaria para el borrado-->
        <!-- para borrar utiliza el metodo DELETE (ESTO LO PODEMOS VER EN LA LISTA)---->
        {{ method_field('DELETE') }}
        <input  type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-danger" style="width: 100%; color:#fff;">
        </form> 
        <br>
        <br>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

</div>

@endsection