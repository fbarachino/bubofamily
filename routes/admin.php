<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ContatoreEnElController;
use App\Http\Controllers\ContatoreGasController;
use App\Http\Controllers\MovimentiController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\FullCalenderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('admin');
});

    Route::get('logout', function(){ Auth::logout(); return redirect('login'); })->name('logout');

    Route::get('movimentis', [MovimentiController::class,'newMovimenti'])->name('movimentis');
    Route::post('movimentis',[MovimentiController::class,'insMovimentiSpesa']);
    Route::get('movimentie', [MovimentiController::class,'newMovimenti'])->name('movimentie');
    Route::post('movimentie',[MovimentiController::class,'insMovimentiEntrata']);
    Route::get('movimenti',[MovimentiController::class,'listMovimenti'])->name('movimenti');
    Route::get('export',[MovimentiController::class,'exportMovimenti'])->name('export');
    Route::get('resoconto',[MovimentiController::class,'resocontoMovimenti'])->name('resoconto');
    Route::get('movmodify',[MovimentiController::class,'updateMovimenti']);
    Route::post('movmodify',[MovimentiController::class,'updatePostMovimenti']);
    Route::get('movdelete',[MovimentiController::class,'deleteMovimenti']);
    
    Route::get('fullcalender', [FullCalenderController::class, 'index']);
    Route::post('fullcalenderAjax', [FullCalenderController::class, 'ajax']);
    
    Route::get('categorie', [CategorieController::class,'listCategorie'])->name('categorie');
    Route::post('categorie', [CategorieController::class,'insCategorie']);
    Route::get('catdelete', [CategorieController::class,'deleteCategorie']);
    Route::get('catmodify', [CategorieController::class,'updateCategorie']);
    Route::post('catmodify', [CategorieController::class,'updatePostCategorie']);
    
    Route::get('tags', [TagController::class,'listTags'])->name('tags');
    Route::post('tags', [TagController::class,'insTags']);
    Route::get('tagmodify', [TagController::class,'updateTag']);
    Route::post('tagmodify', [TagController::class,'updatePostTag']);
    
    Route::get('letturegas', [ContatoreGasController::class,'listLettureGas'])->name('gas');
    Route::post('letturegas', [ContatoreGasController::class,'insLettureGas']);
    
    Route::get('lettureenel', [ContatoreEnElController::class,'listLettureEnel'])->name('enel');
    Route::post('lettureenel', [ContatoreEnElController::class,'insLettureEnel']);
