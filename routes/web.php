<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HistoricotbController;
use App\Http\Controllers\webController;

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
    return view('index');
});

//Route::get('/dashboard2',[HistoricotbController::class,'showPressao'])->middleware(['auth', 'verified'])->name('dashboard');
//Route::get('/dashboard',[HistoricotbController::class,'showColesterol'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard',[HistoricotbController::class,'showGlicose'])->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/historicoadd1',[HistoricotbController::class,'storePressao'])->name('cadastrar-pressao');
Route::post('/historicoadd2',[HistoricotbController::class,'storeColesterol'])->name('cadastrar-colesterol');
Route::post('/historicoadd3',[HistoricotbController::class,'storeGlicose'])->name('cadastrar-glicose');
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



route::get('/',[webController::class,'index'])->name('index');
 

 

 
Route::delete('/delete-historico/{id}',[HistoricotbController::class,'destroy'])->name('delete-historico');
 
Route::get('/historico/{nomeFK}',[HistoricotbController::class,'show'])->name('alterar-historico');
Route::put('/historicoBanco/{nomeFK}',[HistoricotbController::class,'update'])->name('alterarBanco-hitorico');
 
 
// tela em tela
 
Route::get('/colesterol',[webController::class,'showFormCoslesterol'])->name('colesterol-form');
 
Route::get('/glicose',[webController::class,'showFormGlicose'])->name('glicose-form');
 
Route::get('/pressao',[webController::class,'showFormPressao'])->name('pressao-form');
 
Route::get('/suporte',[webController::class,'showFormSuporte'])->name('suporte-form');
 
Route::get('/duvidas',[webController::class,'showFormDuvidas'])->name('duvidas-form');

Route::get('/historico',[webController::class,'showFormDHstorico'])->name('historico-form');

Route::post('/contato',[webController::class,'enviaContato'])->name('envia-Contato');


// rota calculos

route::get('/colesterolCalculo',[webController::class,'calculoColesterol'])->name('calculo-colesterol');

route::get('/pressaoCalculo',[webController::class,'calculoPressao'])->name('calculo-pressao');

route::get('/glicoseCalculo',[webController::class,'calculoGlicose'])->name('calculo-glicose');

Route::post('/calcular-pressao', [webController::class, 'calculoPressao']);

Route::post('/calcular-glicemia', [webController::class, 'calculoGlicose']);

Route::post('/calcular-colesterol', [webController::class, 'calculoColesterol']);