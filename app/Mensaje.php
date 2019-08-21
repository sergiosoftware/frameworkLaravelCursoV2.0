<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model {

    protected $fillable = ['nombre', 'email', 'asunto', 'contenido'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function nota() { // <-- un nombre cualquiera
        // se puede usar morphOne/morphMany
        return $this->morphOne(Nota::class, 'anotacion'); // param2 = llave o prefijo, ver migración: $table->integer('anotacion_id')->unsigned(); 
    }

    public function etiquetas() {
		return $this->morphToMany(Etiqueta::class, 'etiquetable');
	}

}