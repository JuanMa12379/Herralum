<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*--Rutas Del Frontend--*/
Route::get('/','App\Http\Controllers\Front\FrontendController@inicio');
Route::get('categoria/{slug}','App\Http\Controllers\Front\FrontendController@categorias');
Route::get('detalle_producto/{cate_slug}/{pro_slug}','App\Http\Controllers\Front\FrontendController@detalleproducto');
Route::get('contacto', 'App\Http\Controllers\Front\FrontendController@contacto');
Route::get('proyectos', 'App\Http\Controllers\Front\FrontendController@proyectos');
Route::get('detalle_proyecto/{slug}', 'App\Http\Controllers\Front\FrontendController@detalleproyecto');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){
    Route::get('dashboard','AdminController@dashboard');
    /*--Rutas Usuarios--*/
    Route::get('lista_usuarios','UsuarioController@index');
    Route::post('nuevo_usuario','UsuarioController@nuevousuario');
    Route::post('editar_usuario','UsuarioController@editarusuarios');
    Route::delete('eliminar_usuario','UsuarioController@eliminarusuario');
    /*--Rutas Banner--*/
    Route::get('lista_banners','BannerController@index');
    Route::post('nuevo_banner','BannerController@crearbanner');
    Route::post('editar_banner','BannerController@editarbanner');
    Route::delete('eliminar_banner','BannerController@eliminarbanner');

    /*--Rutas Marcas--*/
    Route::get('lista_marcas','MarcaController@listamarca');
    Route::post('editar_marca','MarcaController@editarmarca');
    Route::post('crear_marca','MarcaController@crearmarca');
    Route::delete('eliminar_marca','MarcaController@eliminarmarca');
    /*--Rutas Categorias--*/
    Route::get('lista_categorias','CategoriaController@index');
    Route::post('nueva_categoria','CategoriaController@nuevacategoria');
    Route::post('editar_categoria','CategoriaController@editarcategoria');
    Route::delete('eliminar_categoria','CategoriaController@eliminarcategoria');
    /*--Rutas Tips--*/
    Route::get('lista_tips','TipController@index');
    Route::post('nuevo_tip','TipController@nuevotip');
    Route::post('editar_tip','TipController@editartip');
    Route::delete('eliminar_tip','TipController@eliminartip');

    /*--Rutas Productos--*/
    Route::get('lista_productos','ProductoController@index');
    Route::get('nuevo_producto','ProductoController@nuevoproducto');
    Route::post('guardar_producto','ProductoController@guardarproducto');
    Route::get('editar_producto/{id}','ProductoController@traerproducto');
    Route::post('guardar_producto_editado/{id}','ProductoController@editarproducto');
    Route::delete('eliminar_producto/{id}','ProductoController@eliminarproducto');

    Route::get('lista_proyectos','ProyectoController@listaproyecto');
    Route::get('nuevo_proyecto','ProyectoController@nuevoproyecto');
    Route::post('guardar_proyecto','ProyectoController@guardarproyecto');
    Route::get('editar_proyecto/{id}','ProyectoController@traerproyecto');
    Route::post('guardar_proyecto_editado/{id}','ProyectoController@editarProyecto');
    Route::delete('eliminar-proyecto/{id}', 'ProyectoController@eliminarProyecto');

});