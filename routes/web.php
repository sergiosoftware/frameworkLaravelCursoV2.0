<?php
App::setlocale('es');
// DB::listen(function ($query) {
//        echo "<pre>{ [$query->time] - $query->sql }</pre>";
//     });
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Ruta principal, se accede mediante nombreproyecto.test
/*Route::get('/', function () {  // ruta base de la aplicación
 /   // usar la función route() para indicar la ruta
 /   $html = '
 /       <a href="' . route('productos') . '">Agregar productos</a><br>
 /       <a href="' . route('productos') . '">Actualizar productos</a><br>
 /       <a href="' . route('productos') . '">Dar de baja productos</a><br>
 /       <a href="' . route('productos') . '">Comprar productos</a><br>
 /   ';
 /   echo $html;
 /});
*/
// nombreproyecto.test/ventas
// Route::get('ventas', function(){
//     return 'Esta es la página de ventas';
// });

// Paso de parámetros en las rutas
// Route::get('usuario/{usuario}', function($usuario){
//     return 'Hola '.$usuario;
// });

// Route::get('usuario/{id}/{nombre}', function($id, $nombre){
//     return "Hola $id - $nombre";
// });

// Paso de parámetros por defecto
// Route::get('usuario/{usuario?}', function($usuario='visitante anónimo'){
//     return 'Hola '.$usuario;
// });

// Rutas con nombre
// Route::get('productos', function(){
//     return 'Sección de productos';
// });

// Nuevas versiones
// Route::get('articulos', function () { // la ruta dada
//     return 'Sección de productos';
//  })->name('productos');  // nombre dado a la ruta

// Rutas de vistas
/*Route::get('/', function () { // la ruta principal de la aplicación
/    return view('inicio');
/ })->name('inicio'); // nombre dado a la ruta
*/

// Paso de datos a las vistas
/*Route::get('/', function () {
/    $nombre = 'Sergio';
/    //return view('inicio')->with(['nombre' => $nombre]); //array asociativo
/    return view('inicio', compact('nombre')); //funcion compact hace lo contrario de extract()
/})->name('inicio');
*/

// Forma recomendada para pocos o ningun envio de datos
// $nombre = 'Sergio';
// Route::view('/', 'inicio', ['nombre' => $nombre])->name('inicio');

// Array de productos
// $catalogo = [
//     ['producto' => 'Harina de trigo'],
//     ['producto' => 'Arroz parvorizado'],
//     ['producto' => 'Chocolate en polvo'],
//     ['producto' => 'Café liofilizado'],
//     ['producto' => 'Queso campesino']
// ];

// Motor de plantillas blade
// Route::view('/', 'inicio')->name('inicio');
// Route::get('/', 'OtrasPruebasController@inicio')->name('inicio');
// Route::view('/acercade', 'acercade')->name('acercade');
// Route::get('/catalogo', 'CatalogoController@index')->name('catalogo');
// Route::view('/contacto', 'contacto')->name('contacto');
// Route::resource('catalogo', 'CatalogoController')->except([
//      'index', 'show'
// ]);
// // Route::apiResource('catalogo', 'CatalogoController');
// Route::post('contacto', 'MensajesController@store');
// //Productos
// Route::view('/producto', 'producto')->name('producto');
// Route::post('producto', 'ProductoController@store');

// ESTAS RUTAS SE HACEN POR LO REQUERIDO EN LA PAGINA 38
// Route::get('/', 'OtrasPruebasController@inicio')->name('inicio');

// Route::view('/acercade', 'acercade')->name('acercade');
// Route::get('/catalogo', 'CatalogoController@index')->name('catalogo');

// Route::view('contacto', 'contacto')->name('contacto');
// Route::post('contacto', 'OtrasPruebasController@respuestaContacto');
// Envio de correos
// Route::view('/', 'inicio', ['nombre' => 'Sergio'])->name('inicio');
// Route::view('/acercade', 'acercade')->name('acercade');
// Route::get('/catalogo', 'ProductoController@index')->name('productos.index'); // <-- OJO
// Route::get('/catalogo/{id}','ProductoController@show')->name('productos.show');
// Route::get('/catalogo',
//            'ProductoController@index')->name('productos.index');
// Route::get('/catalogo/crear', // ruta para mostrar la vista                   
//            'ProductoController@create')->name('productos.create');
// Route::post('/catalogo/', // ruta que gestiona el envío por POST
//             'ProductoController@store')->name('productos.store');

// Route::get('/catalogo/{producto}', 'ProductoController@show')->name('productos.show');
// SE REEMPLAZAN PARA REALIZAR LA PAGINA 58
// Route::view('/contacto', 'contacto')->name('contacto');
// Route::post('contacto', 'MensajesController@store');
// Route::get('mensajes/crear', 'MensajeController@create')->name('mensajes.create');
// Route::post('mensajes', 'MensajeController@store')->name('mensajes.store');
// Route::get('mensajes', 'MensajeController@index')->name('mensajes.index');
// Route::get('mensajes/{id}', 'MensajeController@show')->name('mensajes.show');
// Route::get('mensajes/{id}/editar', 'MensajeController@edit')->name('mensajes.edit');
// Route::delete('mensajes/{id}', 'MensajeController@destroy')->name('mensajes.destroy');
// LOS MENSAJES SE COMENTARON PARA EMPEZAR EL TALLER DE GESTION DE MENSAJES CON ELOQUENT
// Route::resource('mensajes', 'MensajeController');

//GESTION BASICA DE USUARIOS

Route::view('/', 'inicio', ['nombre' => 'Sergio Andrés'])->name('inicio');
Route::view('acercade', 'acercade')->name('acercade');
Route::get('catalogo', 'ProductoController@index')->name('catalogo');

// PROBAR TODO LO DEL CATALOGO
// Route::get('/catalogo', 'ProductoController@index')->name('productos.index'); // <-- OJO
// Route::get('/catalogo/{id}','ProductoController@show')->name('productos.show');
// Route::get('/catalogo',
//            'ProductoController@index')->name('productos.index');
// Route::get('/catalogo/crear', // ruta para mostrar la vista                   
//            'ProductoController@create')->name('productos.create');
// Route::post('/catalogo/', // ruta que gestiona el envío por POST
//             'ProductoController@store')->name('productos.store');

// Route::get('/catalogo/{producto}', 'ProductoController@show')->name('productos.show');
//

Route::resource('mensajes', 'MensajeController');

Route::get('login', 'Auth\LoginController@showLoginForm')
       ->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

// LARAVEL FUNDAMENTOS PARTE 2
Route::resource('usuarios', 'UsuariosController');
Route::get('roles', function () {
       return \App\Role::all();
    });
Route::get('roles-usuarios', function () {
       return \App\Role::with('user')->get();
    });