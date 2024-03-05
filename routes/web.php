<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MensagemTesteMail;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('home');
})->middleware('verified');

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home')
    ->middleware('verified');

Route::get('aluno/exportacao','App\Http\Controllers\AlunoController@exportacao')->middleware('verified');
Route::get('aluno/exportacaoescola','App\Http\Controllers\AlunoController@exportacaoescola')->middleware('verified');
Route::post('aluno/exportacaoescolapost','App\Http\Controllers\AlunoController@exportacaoescolapost')
    ->middleware('verified')
    ->name('aluno.exportacaoescolapost');

Route::resource('aluno', 'App\Http\Controllers\AlunoController')->middleware('verified');// o middleware auth está definido lá no controller AlunoController

Route::resource('formulario', 'App\Http\Controllers\FormularioController')->middleware('verified');



Route::get('formulario/{aluno}', 'FormularioController@show')
    ->middleware('verified')
    ->name('formulario.show');


Route::post('aluno/buscar', [App\Http\Controllers\AlunoController::class, 'buscar'])
    ->middleware('verified')
    ->name('aluno.buscar');


//Route::get('/mensagem-teste', function(){
//    return new MensagemTesteMail();
    //Mail::to('leitelealgledson@gmail.com')->send(new MensagemTesteMail());
    //return 'E-mail enviado com sucesso!';
//});
