<?php

use Illuminate\Support\Facades\Route;
use App\Models\Breed;
use App\Models\Postagem;    
use App\Models\Chamado;
use App\Models\Comentario;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;


Route::get('/', function () {
    $post = Postagem::orderBy('id')->get();
    $breed = Breed::orderBy('id')->get();
    $comentario = Comentario::orderBy('created_at')->get(); 
    function calcularIdade($date){
        $time = strtotime($date);
        if($time === false){
          return '';
        }
     
        $year_diff = '';
        $date = date('Y-m-d', $time);
        list($year,$month,$day) = explode('-',$date);
        $year_diff = date('Y') - $year;
        $month_diff = date('m') - $month;
        $day_diff = date('d') - $day;
        if ($day_diff < 0 || $month_diff < 0) $year_diff--;
     
        return $year_diff;
    }
    $idade = calcularIdade('2004-10-20');
    return view('site.principal', compact('post','breed','comentario','idade'));
});
Route::resource('users','UserController');
Route::resource('comentario', 'ComentarioController')->middleware('auth');
Route::resource('postagem', 'PostagemController')->middleware('auth');
Route::resource('chamado', 'ChamadoController');

Route::get('/relatorio' ,'RelatorioController@createReport')->name('reports')->middleware('auth');
//Autenticação
Route::view('/login','login.form')->name('login.form');
Route::get('/testFacade', function(){
    return UserPermissions::test();
});


require __DIR__.'/auth.php';
