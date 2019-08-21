<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $catalogo = [
        //     ['producto' => 'Harina de trigo'],
        //     ['producto' => 'Arroz parvorizado'],
        //     ['producto' => 'Chocolate en polvo'],
        //     ['producto' => 'Café liofilizado'],
        //     ['producto' => 'Queso campesino'],
        // ];
 
        // return view('catalogo', compact('catalogo'));
        // $catalogo = \DB::table('productos')->get();
        // $catalogo = Producto::get();        
        // $catalogo = Producto::orderBy('created_at', 'DESC')->get(); // Obtener filas en orden inverso
        // $catalogo = Producto::latest('nombre')->get();
        // $catalogo = Producto::latest()->paginate(2); // 15 por página como default, si se indica un valor esas serian las filas por pagina
        // return view('catalogo', compact('catalogo'));
        // la vista referenciada: 'catalogo.blade.php'
        // return view('catalogo', [
        // // array asociativo procesado en 'catalogo.blade.php'
        // 'productos' => Producto::latest()->paginate(2)
        // ]);
        return view('productos.index', [
            'productos' => Producto::latest()->paginate(2),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    //     Producto::create($request->validated());
    //     return redirect()->route('productos.index');
    // }
    // public function store() {
    //     return request(['nombre']);  // inspeccionar la petición y retornarla
    // }
    // public function store(Request $request) {
    //     return $request->get('nombre');
    // }
    public function store() {
        Producto::create([
            'nombre' => request('nombre'),
            'precio' => request('precio'),
            'iva' => request('iva'),
            'cantidad_disponible' => request('cantidad_disponible'),
            'cantidad_minima' => request('cantidad_minima'),
            'cantidad_maxima' => request('cantidad_maxima'),
            'url' => request('url')
        ]);
        return redirect()->route('productos.index');
    }
    // // Datos y columnas coinciden en los nombres 
    // public function store() {
    //     Producto::create(request()->all());
    //     return redirect()->route('productos.index');
    // }
    public function create() {
        return view('productos.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    //     // return $id;
    //     // return Producto::find($id); //formato JSON
    //     // return view('productos.show', [
    //     //     'producto' => Producto::find($id),
    //     // ]); //Utilizar una view
    //     return view('productos.show', [
    //         'producto' => Producto::findOrFail($id),
    //     ]); // Verificar si el id existe o no 
    // }
    public function show(Producto $producto) {
        return view('productos.show', [
            'producto' => $producto
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
