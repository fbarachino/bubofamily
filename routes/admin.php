<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\CondominioController;
use App\Http\Controllers\ContatoreEnElController;
use App\Http\Controllers\ContatoreGasController;
use App\Http\Controllers\DocumentiController;
use App\Http\Controllers\MovimentiController;
use App\Http\Controllers\RigaProgettoController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\AutoController;
use App\Http\Controllers\AnagraficaController;
use App\Http\Controllers\Utenti;
use App\Http\Controllers\ProgettiController;
use App\Http\Controllers\TaskController;
use App\Mail\myTestEmail;

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

Route::get('/', [MovimentiController::class,'dashboard']);

    Route::get('logout', function(){ Auth::logout(); return redirect('login'); })->name('logout');

// MOVIMENTI
Route::group(['middleware'=>['permission:conti']], function(){
    Route::post('movimenti/spesa',[MovimentiController::class,'insMovimentiSpesa']);
    Route::post('movimenti/entrata',[MovimentiController::class,'insMovimentiEntrata']);
    Route::get('movimenti',[MovimentiController::class,'listMovimenti'])->name('movimenti');
    Route::get('movimenti/export',[MovimentiController::class,'exportMovimenti'])->name('export');
    Route::get('movimenti/resoconto',[MovimentiController::class,'resocontoMovimenti'])->name('resoconto');
    Route::get('movimenti/modify/{id}',[MovimentiController::class,'updateMovimenti']);
    Route::post('movimenti/modify',[MovimentiController::class,'updatePostMovimenti']);
    Route::get('movimenti/delete',[MovimentiController::class,'deleteMovimenti']);
    Route::get('movimenti/reportbudget/{anno?}',[MovimentiController::class,'reportCategorieAnno'])->name('budget');
    Route::post('movimenti/reportbudget/{anno?}',[MovimentiController::class,'manageRedirect']);
    Route::get('movimenti/reportbudgetxls',[MovimentiController::class,'reportCategorieAnnoXLS'])->name('budgetxls');
    Route::get('movimenti/filter/tags',[MovimentiController::class,'filterByTag']);
    Route::get('movimenti/report/movimenti_categoria', [MovimentiController::class,'listMovPerCateg']);
    Route::get('movimenti/report/movimentibycat', [MovimentiController::class,'listMovbyCat']);
    Route::get('movimenti/docs', [DocumentiController::class,'fileForm'])->name('documenti');
    Route::post('movimenti/docs', [DocumentiController::class,'storeFile']);
    Route::get('movimenti/import', [MovimentiController::class,'importFile'])->name('importING');
    Route::post('movimenti/import', [MovimentiController::class,'importEC_ING']);
    Route::get('movimenti/importcr', [MovimentiController::class,'importFileCR'])->name('importCR');
    Route::post('movimenti/importcr', [MovimentiController::class,'importEC_CR']);


// CATEGORIE
    Route::get('categorie', [CategorieController::class,'listCategorie'])->name('categorie');
    Route::post('categorie', [CategorieController::class,'insCategorie']);
    Route::get('categorie/delete', [CategorieController::class,'deleteCategorie']);
    Route::get('categorie/modify/{id}', [CategorieController::class,'updateCategorie']);
    Route::post('categorie/modify', [CategorieController::class,'updatePostCategorie']);

// Richiami di servizio da jquery
    Route::get('service/catlist', [CategorieController::class,'apiList']);
    Route::get('service/taglist', [TagController::class,'apiList']);
    Route::get('service/rolesList', [Utenti::class,'listRoles']);
    Route::get('service/catlistSpesa', [CategorieController::class,'apiListSpesa']);
    Route::get('service/catlistEntrata', [CategorieController::class,'apiListEntrata']);

// TAGS
    Route::get('tags', [TagController::class,'listTags'])->name('tags');
    Route::post('tags', [TagController::class,'insTags']);
    Route::get('tags/modify/{id}', [TagController::class,'updateTag']);
    Route::post('tags/modify', [TagController::class,'updatePostTag']);
    Route::get('tags/delete/{id}',[TagController::class,'deleteTag']);
});
// CONSUMI
Route::group(['middleware'=>['permission:consumi']], function(){
    Route::get('consumi/gas', [ContatoreGasController::class,'listLettureGas'])->name('gas');
    Route::post('consumi/gas', [ContatoreGasController::class,'insLettureGas']);
    Route::get('consumi/enel', [ContatoreEnElController::class,'listLettureEnel'])->name('enel');
    Route::post('consumi/enel', [ContatoreEnElController::class,'insLettureEnel']);
});

// AUTOMOBILI
Route::group(['middleware'=>['permission:automobili']], function(){
    Route::get('auto', [AutoController::class, 'index'])->name('auto_list');
    Route::get('auto/new', [AutoController::class, 'newAuto'])->name('auto_new');
    Route::post('auto/new', [AutoController::class, 'saveAuto'])->name('auto_save');
    Route::get('auto/getAuto/{id}', [AutoController::class, 'getAutoById']);
    Route::post('auto/modify', [AutoController::class, 'udateAuto']);
    Route::get('auto/delete', [AutoController::class, 'delAuto']);
    Route::get('auto/detail', [AutoController::class, 'getAutoDetails']);
    Route::get('auto/rifornimento/{id}', [AutoController::class, 'rifornimentoAuto'])->name('auto_rifornimento');
    Route::post('auto/rifornimento', [AutoController::class, 'saveRifornimento']);
    Route::get('auto/revisione', [AutoController::class, 'revisioneAuto']);
    Route::post('auto/revisione', [AutoController::class, 'saveRevisione']);
    Route::get('auto/manutenzione', [AutoController::class, 'manutenzioneAuto']);
    Route::post('auto/manutenzione', [AutoController::class, 'saveManutenzione']);
    Route::get('auto/accessori', [AutoController::class, 'accessoriAuto']);
    Route::post('auto/accessori', [AutoController::class, 'saveAccessori']);
    Route::get('auto/operazioni', [AutoController::class, 'getOperazioni']);
    Route::get('auto/operazioni/pdf', [AutoController::class, 'exportPdfOperazioni']);
});
// CONTATTI
Route::group(['middleware'=>['permission:contatti']], function(){
    Route::get('contatti', [AnagraficaController::class, 'listContact'])->name('contatti');
    Route::get('contatti/new', [AnagraficaController::class, 'newContact'])->name('newContact');
    Route::post('contatti/new', [AnagraficaController::class, 'insContact']);
    Route::get('contatti/modifica', [AnagraficaController::class, 'modifica']);
    Route::get('contatti/scheda', [AnagraficaController::class, 'getScheda']);
    Route::get('contatti/addOther', [AnagraficaController::class, 'insOtherContact']);
    Route::post('contatti/addOther', [AnagraficaController::class, 'saveOtherContact']);
});

// GRUPPI E PERMESSI
Route::group(['middleware'=>['permission:amministrazione']], function(){
    
    Route::get('users/new',[Utenti::class,'addUser']);
    Route::post('users/new',[Utenti::class,'createUser']);
    Route::get('users/roles',[Utenti::class,'listRoles']);
    Route::get('users/delete/{id}',[Utenti::class,'deleteUser']);
    Route::get('users/givepermission',[Utenti::class,'givePermissionToUser']);
    Route::post('users/givepermission',[Utenti::class,'assignPermission']);
    Route::get('users/giverole',[Utenti::class,'giveRoleToUser']);
    Route::post('users/giverole',[Utenti::class,'assignRole']);
});

// PROGETTI
Route::group(['middleware'=>['permission:progetti']], function(){
    Route::get('progetti', [ProgettiController::class, 'listaProgetto'])->name('progetti');
    Route::post('progetti/new', [ProgettiController::class, 'salvaProgetto']);
    Route::get('progetti/new', [ProgettiController::class, 'nuovoProgetto'])->name('nuovoProgetto');
    Route::get('progetti/delete',[ProgettiController::class, 'deleteProgetto']);
    Route::get('progetti/delete_row/{id_row}/return/{id_prog}',[RigaProgettoController::class, 'deleterow']);
    Route::get('progetti/detail/{id}', [ProgettiController::class, 'dettaglioProgetto'])->name('detail');
    Route::post('progetti/detail/{id}', [RigaProgettoController::class, 'inserisciRiga']);
    Route::get('progetti/detail/edit/{id}', [RigaProgettoController::class, 'editRiga']);
    Route::post('progetti/rigaupdate', [RigaProgettoController::class, 'updateRiga']);
    Route::get('progetti/coordinatori', [ProgettiController::class, 'getCoordinatori']);
    Route::get('progetti/close',[ProgettiController::class, 'chiudiProgetto']);
    Route::get('progetti/reopen',[ProgettiController::class, 'riapriProgetto']);
    Route::get('progetti/print',[ProgettiController::class,'stampaPDFProgetto']);
});

// TASKS
Route::group(['middleware'=>['permission:tasks']], function(){
    Route::get('tasks', [TaskController::class, 'listTask'])->name('tasks');

});

// -- ONLY FOR TEST -- TO BE REMOVED //

/// TEST ROUTES
    Route::get('test/fullcalendar', [FullCalenderController::class, 'index']);
    Route::post('test/fullcalendar', [FullCalenderController::class, 'ajax']);
    Route::get('test/condominio',[CondominioController::class,'testPdf']);
    Route::get('test/err403',[CondominioController::class,'err403'])->name('errore-403');
    Route::get('test/user_role',[CondominioController::class,'user_role']);
    Route::get('test/userclass',[Utenti::class,'userClass']);

    Route::get('testmail',function(){
        $name='Flavio';
        Mail::to('git@lavorain.cloud')->send(new myTestEmail($name));
    });
