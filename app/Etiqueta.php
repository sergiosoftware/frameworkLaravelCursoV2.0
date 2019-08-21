<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model {
    
    protected $fillable = ['nombre'];
	
    public function mensajes() {
		return $this->morphedByMany(Mensaje::class, 'etiquetable');
    }

    public function users() {
		return $this->morphedByMany(User::class, 'etiquetable');
    }
    
}