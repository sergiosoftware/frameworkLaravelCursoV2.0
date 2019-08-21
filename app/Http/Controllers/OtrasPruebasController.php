<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OtrasPruebasController extends Controller
{
    // public function __construct() {
    //     $this->middleware('ejemplo');
    // }
    public function __construct() {
        $this->middleware('ejemplo', ['only' => ['respuestaContacto']]);
        // $this->middleware('ejemplo', ['except' => ['inicio']]);
    }
    // public function inicio() {
    //     return response('Contenido de la respuesta', 201,['ESTADO-TOKEN' => 'Hasta ahora todo bien']);
    // }
    public function inicio() {
        return response('Contenido de la respuesta', 201)
            ->header('ESTADO-TOKEN', 'Hasta ahora todo bien')
            ->header('ESTADO2-TOKEN', 'La cosa sigue bien')
            ->cookie('MI-COOKIE', 'Este dato se envía encriptado');
    }
 
    // public function respuestaContacto(Request $request) {
    //     $data = $request->all();
    //     return response()->json([
    //         'data' => $data
    //     ], 202)->header('MI-TOKEN', 'cualquier cosa');
    // }
    // public function respuestaContacto(Request $request) {
    //     $data = $request->all();
    //     return redirect()->route('inicio');
    // }
    // public function respuestaContacto(Request $request) {
    //     $data = $request->all();
    //     return redirect()
    //         ->route('contacto')
    //         ->with('info', 'Mensaje enviado correctamente');
    // }
    public function respuestaContacto(Request $request) {
        $data = $request->all();
        return back()->with('info', 'Mensaje enviado correctamente');
    }
}
