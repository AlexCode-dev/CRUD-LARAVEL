<!-- Mostrar las listas de peliculas -->
<!--Las siguientes 3 lineas extends section y div container son importantisimas para el uso de bootstrap--->

@extends('layouts.app')

@section('content')
<div class="container">
  <div class="present">
  <h1>&#127903;&#65039; CRUD PELICULAS &#127903;&#65039;</h1>
  <p>ingrese los datos de la pelicula o actor</p>
  </div>
  
  <div class="botones">
    <a href="{{url('pelicula/create')}}" class="boton">REGISTRAR NUEVA PELICULA</a>
    <!-- <a href="{{url('actor/create')}}" class="btn btn-dark">REGISTRAR NUEVO ACTOR AJAX</a> -->
    <a href="{{url('/actor')}}" class="boton">MOSTRAR ACTORES</a>
  </div>
  <!-- Creamos las rutas que nos lleve a la ruta create -->

  <!-- 
<a href="{{url('pelicula/create')}}" class="btn btn-dark">MOSTRAR PAGINA DE PELICULAS FAVORITAS</a> -->


  <br />
  <br />
  <table class="table align-middle mb-0 bg-white text-center ">
    <thead class="table bg-dark ">
      <tr>
        <th scope="col">#</th> <!--ID-->
        <th scope="col">Titulo</th>
        <th scope="col">Duracion</th>
        <th scope="col">Sinopsis</th>
        <th scope="col">Actor</th>
        <th scope="col">Imagen</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      <!-- recorremos la variable que pusimos en el index -->
      @foreach($peliculas as $pelicula)

      <tr>
        <th scope="row">{{ $pelicula->id }}</th>
        <td>{{ $pelicula->titulo }}</td>
        <td>{{ $pelicula->duracion }}</td>
        <td>{{ $pelicula->sinopsis }}</td>

        <td>{{ $pelicula->actor->name}}</td>


        <td>
          <img class="rounded" src="{{ asset('storage').'/'.$pelicula->imagen }}" width="150px">
        </td>
        <td>

          {{--
      <form action="{{ route('favoritos.store', $pelicula) }}" method="POST">
          @csrf
          <button type="submit">Seleccionar película como favorita</button>
          </form>
          <br>
          <br> --}}
          <!--Editar. Enviamos el id en la url ()-->
          <a href="{{url('/pelicula/'.$pelicula->id.'/edit')}}" class="btn btn-dark" style="width: 70%;  color:#fff;">Editar</a>


          <br>
          <br>
          <form method="post" action="{{ url('/pelicula/'.$pelicula->id) }}" class="d-inline">
            @csrf <!--llave necesaria para el borrado-->
            <!-- para borrar utiliza el metodo DELETE (ESTO LO PODEMOS VER EN LA LISTA)---->
            {{ method_field('DELETE') }}
            <input type="submit" onclick="return confirm('¿Quieres borrar?')" value="Borrar" class="btn btn-dark" style="width: 70%; color:#fff; ">
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
