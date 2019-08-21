<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $table = 'productos';
    protected $fillable = ['nombre', 'precio', 'iva',
                          'cantidad_disponible',          
                          'cantidad_minima', 'cantidad_maxima', 'url'
                         ];

    public function getRouteKeyName() {
        return 'url';
    }
    // public function getRouteKeyName() {
    //     return 'nombre';
    // }

}
