<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\CreateUserRequest;/////////////////////////////


class UsuariosController extends Controller
{
    // function __construct() {
    //     $this->middleware([
    //         'auth', 'roles:Administrador,Editor'
    //     ]);
    // }
    function __construct() { //
        $this->middleware('auth', ['except' => ['show']]);
        // la siguiente excepción hace que edit de usuarios pueda ser accesible para cualquier ID desde la barra de direcciones
        $this->middleware('roles:Administrador', ['except' => ['destroy', 'edit', 'update', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $usuarios = User::with(['roles', 'nota', 'etiquetas'])->get();
        return view('usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $roles = Role::pluck('nombre', 'id');
        return view('usuarios.crear', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request) {
        // dd($request->all()); // <-- ver lo que llega
        $user = User::create($request->all()); // guardar usuario
        $user->roles()->attach($request->roles); // guardar roles
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) { 
        $usuario = User::findOrFail($id);
        return view('usuarios.show', compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $usuario = User::findOrFail($id); // se importó la clase para poder usar
        $this->authorize($usuario);
        $roles = Role::pluck('nombre', 'id');
        // dd($roles); // <-- descomente si desea ver cómo llegan los datos a vista
        return view('usuarios.editar', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id) {
        // dd($request->all()); // <-- ver datos recibidos
        $usuario = User::findOrFail($id);
        $this->authorize($usuario);
        // $request->all() | $request->only | $request->except
        $usuario->update($request->except('password')); 
        $usuario->roles()->sync($request->roles); // attach duplica
        return back()->with('info', 'Usuario actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $usuario = User::findOrFail($id);
        // $this->authorize($usuario);  
        // <-- quité lo anterior porque intentaría autorizar al usuario actual y lo que quiero
        // es que cumpla con las políticas definidas en ..\app\Policies\UserPolicy.php
        $usuario->roles()->detach(); // <-- Esto no sería necesario con eliminación en cascada
        $usuario->delete();
        return back();
    }
 
}
