<!-- Formulario que tendra los datos en comun con create y edit -->
<script src="/jquery.js"></script>
<h1> {{$modo}} Actores</h1>

<div class="form-group">
    <label for="name">Nombre</label>
    <!--Validacion de datos con isset, preguntamos si existe.. entonces mostra el valor si no no muestres nado-->
    <!--Esto estamos haciendo por que usamos un mismo formulario para todo--->
    <input type="text" class="form-control" name="name" id="name" required value="{{isset($actor->name)?$actor->name:''}}">

</div>
<br />
<!-- aqui le pasamos el 'modo' que creamos en edit.blade -->
<button type="submit" class="btn btn-info btnenviar"><i class="fas fa-save"></i> Guardar</button>
<a class="btn btn-primary" href="{{ url('actor/') }}">Regresar </a>



<script type="text/javascript">
   

$(".btnenviar").click(function(e){
    e.preventDefault(); //evitar recargar la pagina
    var name = $("input[name=name]").val();
    console.log("asdadsadsa");
    $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'POST',
        url:"{{ route('almacenarActor') }}",
        data:{name:name},
        success:function(data){
            alert('Actor creado exitosamente!');
            //limpiarCampos();
        },
        error:function(data){
            alert('Ha ocurrido un error al crear el actor.');
        }
    });
});

</script>
