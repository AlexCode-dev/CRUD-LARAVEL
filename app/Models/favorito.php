<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorito extends Model
{
    use HasFactory;
    public function favoritas()
    {
        return $this->belongsTo(User::class, 'user_id');
       
    }
}
