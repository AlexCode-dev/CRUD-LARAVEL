<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\actor;

use Illuminate\Support\Facades\Storage;//para hacer el borrado de la foto
class PeliculaController extends Controller
{
  
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peliculas = Pelicula::all();
        $actores = Actor::all();
        return view('pelicula.index', compact('peliculas', 'actores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $pelicula = new Pelicula();
        //con pluck traemos todos los actores 
        $actores = actor::pluck('name','id');
        return view('pelicula.create', compact('pelicula', 'actores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //$datosPelicula = request()->all();
       $datosPelicula = request()->except('_token'); //excepto el token
       
      //si tiene imagen entonces
      if(request()->hasFile('Imagen')){
        //['imagen'] es el campo que vamos a alterar. Y añadimos el lugar donde se va a encontrar(insertar) la imagen. con store() le decimos que esta en uploads y se encuentra en public
        $datosPelicula['Imagen'] = $request->file('Imagen')->store('uploads','public');
      }
    //   $request= request()->all();
    //   $pelicula = new Pelicula;
    //   $pelicula -> titulo = $request['Titulo'];
      
    
    
       Pelicula::insert($datosPelicula);//insertamos el datopelicula 
      // return response()->json($datosPelicula);
      return redirect('pelicula');
    }

    /**
     * Display the specified resource.
     */
    public function show()
     {
        $peliculas = Pelicula::all();
        return view('pelicula.show', compact('peliculas'));
    } 

    

     //recibimos el id por que lo enviamos por la url
    public function edit($id)
    {
        //recuperamos la informacion
        $pelicula = Pelicula::find($id);
        //con pluck traemos todos los actores 
        $actores = actor::pluck('name','id');
        //pasamos todos los datos con compact
       return view('pelicula.edit', compact('pelicula', 'actores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //aqui llega la informacion por el patch
        //quitamos el token y el method
        $datosPelicula = request()->except(['_token','_method']);
       
       //esto cuando el cliente cambie  la foto en el edit, preguntamos si la foto esta vacia
        if(request()->hasFile('Imagen')){
        $pelicula = Pelicula::findOrFail($id);
        //con esto borramos la antigua foto
        Storage::delete('public/'.$pelicula->imagen);
        //['imagen'] es el campo que vamos a alterar. Y añadimos el lugar donde se va a encontrar(insertar) la imagen. con store() le decimos que esta en uploads y se encuentra en public
        $datosPelicula['Imagen'] = $request->file('Imagen')->store('uploads','public');
      }
       
      //por ultimo actualizamos:
       
        //si realmente coinciden con el id que recibimos, una vez que lo encuentres haces el update
        Pelicula::where('id','=',$id) -> update($datosPelicula);
         
        //recuperamos la informacion
         $pelicula = Pelicula::find($id);
         //pasamos todos los datos con compact
        //  return redirect('pelicula/'.$pelicula->id.'/edit');
         return redirect('/pelicula');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //borremos la foto de public -> storage
        $pelicula = Pelicula::findOrFail($id);//consultamos por la informacion del id
        //la funcion delete devuelve un valor booleano
        if(Storage::delete('public/'.$pelicula->id)){
            Pelicula::destroy($id);
        }

 
        return redirect('pelicula');

    }
}
