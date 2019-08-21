<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use Mail;
use App\Mensaje;
use App\Events\MensajeRecibido;/////////////////////////////////

class MensajeController extends Controller
{
    // Constructor para autenticacion
    function __construct() {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $mensajes = DB::table('mensajes')->get();
        // return view('mensajes.index', compact('mensajes'));
        // $mensajes = Mensaje::all();
        // $mensajes = Mensaje::with('user')->get();
        // $mensajes = Mensaje::with(['user', 'nota'])->get();
        $mensajes = Mensaje::with(['user', 'nota', 'etiquetas'])->get();
        return view('mensajes.index', compact('mensajes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $mostrarCampos = auth()->guest();
        return view('mensajes.crear', 
                     compact('mostrarCampos', 'mostrarCampos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // Guardar el mensaje
        // DB::table('mensajes')->insert([
        //     'nombre' => $request->input('nombre'),
        //     'email' => $request->input('correo'),
        //     'asunto' => $request->input('asunto'),
        //     'contenido' => $request->input('contenido'),
        //     'created_at' => Carbon::now(),
        //     'updated_at' => Carbon::now(),
        // ]);
        // // redireccionar. Más adelante se le pedirá que cambie esto
        // return redirect()->route('mensajes.index');
        // Mensaje::create([
        //     'nombre' => $request->input('nombre'),
        //     'email' => $request->input('correo'),
        //     'asunto' => $request->input('asunto'),
        //     'contenido' => $request->input('contenido')
        // ]); 
        // // Mensaje::create($request->all()); //Esta forma de creacion es asumiendo que desde el formulario se envian todos los datos necesarios      
        // dd($request->all()); //Perlita
        // return redirect()->route('mensajes.index');
        if (auth()->check()) {
            $datosUsuario = auth()->user()->getAttributes();
            $request->request->add([
                'nombre' => $datosUsuario['name'],
                'email' => $datosUsuario['email'],
            ]);
        }
 
        $mensaje = Mensaje::create($request->all());
 
        if (auth()->check()) {
            auth()->user()->messages()->save($mensaje);
        }
 
        event(new MensajeRecibido($mensaje));
 
        return redirect()->route('mensajes.create')
                         ->with('info', 'Hemos recibido tu mensaje');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        // $mensaje = DB::table('mensajes')->where('id',
        //                      $id)->first();
        // return view('mensajes.show', compact('mensaje'));
        $mensaje = Mensaje::findOrFail($id);
        return view('mensajes.show', compact('mensaje'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
       $mensaje = Mensaje::findOrFail($id);
       $mostrarCampos = !$mensaje->user_id;
       return view('mensajes.editar', 
                    compact('mensaje', 'mostrarCampos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        // DB::table('mensajes')->where('id', $id)->update([
        //     'nombre' => $request->input('nombre'),
        //     'email' => $request->input('correo'),
        //     'asunto' => $request->input('asunto'),
        //     'mensaje' => $request->input('contenido'),
        //     'updated_at' => Carbon::now()
        // ]);
        // return redirect()->route('mensajes.index');
        Mensaje::findOrFail($id)->update($request->all());
        return redirect()->route('mensajes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // DB::table('mensajes')->where('id', $id)->delete();
        // return redirect()->route('mensajes.index');
        Mensaje::findOrFail($id)->delete();
        return redirect()->route('mensajes.index');
    }
}
