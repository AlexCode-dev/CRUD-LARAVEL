<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\ActorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//accede directamente a la vista welcome.blade.php (por default)
Route::get('/', function () {
    return view('auth.login');
});
// // cuando escribamos /empleado me tendria que mostrar el apartado de pelicula 
// Route::get('/pelicula', function () {
//     return view('pelicula.index');
// });

// //acceso mediante el uso de clases que es el uso de controller!
// //con esto accedemos al controller de peliculas, para acceder el metodo create
// Route::get('pelicula/create', [PeliculaController::class,'create']);

//tengamos un acceso completo
//Route::resource('pelicula', PeliculaController::class);

Auth::routes();


// group (prefijo, admin)
//Route::group() que nos permite simplificar nuestro archivo de rutas, organizándolas en grupos que comparten elementos en común como pueden ser middleware, namespaces, sub-dominios, entre otros;

Route::group(['middleware'=>'auth'],function(){
    //redireccion
    
    Route::get('/pelicula', [App\Http\Controllers\PeliculaController::class, 'index']);
    Route::post('/favoritos/{pelicula}', 'FavoritosController@store');//{pelicula} placeholder //no tiene que ver nada
    // resources ->Este método se utiliza para definir rutas que manejan múltiples acciones relacionadas con un recurso en particular.
    Route::get('/pelicula/create', [App\Http\Controllers\PeliculaController::class, 'create']);
    Route::post('/pelicula/create', [App\Http\Controllers\PeliculaController::class, 'store']);//parte de lo mismo
    // Route::get('/pelicula/create', [App\Http\Controllers\PeliculaController::class, 'edit']); //no la agarra nombre ruta + metodo
    Route::get('/pelicula/{pelicula}/edit', [App\Http\Controllers\PeliculaController::class, 'edit']);
    Route::put('/pelicula/{pelicula}/edit', [App\Http\Controllers\PeliculaController::class, 'update']);
    // get post login

    //Delete  esta ruta se utiliza para eliminar una película de la base de datos utilizando el método destroy() del controlador PeliculaController.
    Route::delete('/pelicula/{pelicula}', [App\Http\Controllers\PeliculaController::class, 'destroy']);

   //actor

    //Vista principal /actor que llama al metodo index que devuelve la vista index
    Route::get('/actor', [App\Http\Controllers\ActorController::class, 'index']);

    Route::get('/actor/{actor}/edit', [App\Http\Controllers\ActorController::class, 'edit']);
    Route::put('/actor/{actor}/edit', [App\Http\Controllers\ActorController::class, 'update']);
    Route::get('/actor/create', [App\Http\Controllers\ActorController::class, 'create']);
    Route::post('/actor/create', [App\Http\Controllers\ActorController::class, 'store'])->name('almacenarActor');
    Route::delete('/actor/{actor}', [App\Http\Controllers\ActorController::class, 'destroy']);//ver esto pero tiene que ver con el oncascade

});
// Route::resource('actor', ActorController::class); 

//realizar el enrutamiento de / a peliculas



