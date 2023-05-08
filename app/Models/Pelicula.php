<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    // protected $fillable = ['titulo','sinopsis','imagen','actor_id']; //En $fillable tú tienes que agregar aquellos atributos que SÍ quieres que se 'llenen' en tu base de datos,
    use HasFactory;
    // public function favoritos()
    // {
    //     return $this->belongsToMany(favorito::class, 'id');
    // }

    public function actor()
    {
        return $this->belongsTo(actor::class);
    }

}

