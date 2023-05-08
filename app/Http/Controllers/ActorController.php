<?php

namespace App\Http\Controllers;

use App\Models\actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $actores = Actor::all();
        return view('actor.index', compact('actores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //creamos un nuevo actor
        return view('actor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         //$datosPelicula = request()->all();
       $datosActor = request()->except('_token'); //excepto el token
       //si tiene imagen entonces
      
        actor::insert($datosActor);//insertamos el datopelicula 
       // return response()->json($datosPelicula);
       return redirect('pelicula');
    }

    /**
     * Display the specified resource.
     */
    public function show(actor $actor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //recuperamos la informacion
        $actor = actor::find($id);
 
       return view('actor.edit', compact('actor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //aqui llega la informacion por el patch
        //quitamos el token y el method
        $datosActor = request()->except(['_token','_method']);
       
       
      //por ultimo actualizamos:
       
        //si realmente coinciden con el id que recibimos, una vez que lo encuentres haces el update
        actor::where('id','=',$id) -> update($datosActor);
         
        //recuperamos la informacion
         $actor = actor::find($id);
         //pasamos todos los datos con compact
        //  return redirect('pelicula/'.$pelicula->id.'/edit');
         return redirect('/actor');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //borremos la foto de public -> storage
        $actor = actor::findOrFail($id);//consultamos por la informacion del id
        //la funcion delete devuelve un valor booleano
    
            actor::destroy($id);
    

 
        return redirect('actor');

    }
}
