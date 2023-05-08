<!-- Formulario que tendra los datos en comun con create y edit -->
<h1 style="text-align: center;"> {{$modo}} Pelicula&#128253;&#65039;&#128253;&#65039;</h1>

<div class="form-group">
    <label for="Titulo">Titulo</label>
    <!--Validacion de datos con isset, preguntamos si existe.. entonces mostra el valor si no no muestres nado-->
    <!--Esto estamos haciendo por que usamos un mismo formulario para todo--->
    <input type="text" class="form-control" name="Titulo" id="Titulo" value="{{isset($pelicula->titulo)?$pelicula->titulo:''}}">

</div>
<br />
<div class="form-group">
    <label for="Duracion">Duracion</label>
    <input class="form-control" type="text" name="Duracion" id="Duracion" value="{{isset($pelicula->duracion)?$pelicula->duracion:''}}">

</div>
<br />
<div class="form-group">
    <label for="Sinopsis">Sinopsis</label>
    <textarea class="form-control" name="Sinopsis" id="Sinopsis" rows="3">{{isset($pelicula->sinopsis)?$pelicula->sinopsis:''}}</textarea>
</div>
<br />

<div class="form-group">
    <label for="Imagen">Imagen</label>
    @if(isset($pelicula->imagen))
    <img src="{{ asset('storage').'/'.$pelicula->imagen }}" width="100px">
    <br />
    @endif
    <br />
    <input class="form-control" type="file" name="Imagen" value="" id="Imagen">
</div>
<div class="form-group">
    <br>
    <label>Actor</label>
<select class="form-select" aria-label="Default select example"  name="actor_id">
    <option value="">Seleccionar actor</option>
    <!-- as $id => $name indica que para cada elemento del arreglo, queremos asignar su índice a la variable $id y su valor a la variable $name. De esta manera, dentro del ciclo foreach, podemos acceder a cada uno de los elementos del arreglo utilizando estas variables. -->
    @foreach($actores as $id => $name)
        <option value="{{ $id }}"  @if($pelicula->actor_id == $id) selected @endif>
        {{ $name }}</option>
    @endforeach
</select>
    

</div>
<br /> 
























<!-- aqui le pasamos el 'modo' que creamos en edit.blade -->
<input type="submit" value="{{$modo}} datos" class="btn btn-success">
<a class="btn btn-primary" href="{{ url('pelicula/') }}">Regresar </a>