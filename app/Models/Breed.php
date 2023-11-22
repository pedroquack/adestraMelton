<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    public function chamado() {
        return $this->belongsTo('App\Models\Chamado');
    }
    public function postagem() {
        return $this->belongsTo('App\Models\Postagem');
    }
}

