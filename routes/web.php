<?php

use Illuminate\Support\Facades\Route;
use App\Models\Breed;
use App\Models\Postagem;    
use App\Models\Chamado;
use App\Models\Comentario;
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

Route::get('/', function () {
    $post = Postagem::orderBy('id')->get();
    $breed = Breed::orderBy('id')->get();
    $comentario = Comentario::orderBy('created_at')->get(); 
    return view('site.principal', compact('post','breed','comentario'));
});
Route::resource('comentario', 'ComentarioController');
Route::resource('postagem', 'PostagemController');
Route::resource('chamado', 'ChamadoController');

