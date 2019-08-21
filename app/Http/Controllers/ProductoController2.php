<?php

namespace App\Http\Controllers;

use App\Producto;
use Illuminate\Http\Request;
use App\Http\Requests\CreateProductoRequest;

class ProductoController extends Controller
{
    // Para utilizar CreateProductoRequest, sólo se requiere 
    // importar la clase e implementar el método store() de la
    //  siguiente manera:

    public function store(CreateProductoRequest $request) {
        Producto::create($request->validated());
        return redirect()->route('productos.index');
    }
    // public function store() {
    //     $campos = request()->validate([
    //         'nombre' => 'required',
    //         'precio' => 'required',
    //         'iva' => 'required',
    //         'cantidad_disponible' => 'required'
    //     ]);
 
    //     Producto::create($campos);
    //     return redirect()->route('productos.index');
    // }
}
