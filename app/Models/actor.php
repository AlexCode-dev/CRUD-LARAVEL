<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actor extends Model
{
    use HasFactory;



    // protected $table = "actors";
    // protected $primaryKey = "id";

    public function pelicula()
    {
       
        return $this->hasOne(Pelicula::class, 'pelicula_id', 'id');
    }

}
