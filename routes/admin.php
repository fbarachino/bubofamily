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
    Route::get('reportbudget/{anno?}',[MovimentiController::class,'reportCategorieAnno'])->name('budget');
    Route::post('reportbudget/{anno?}',[MovimentiController::class,'manageRedirect']);
    Route::get('reportbudgetxls',[MovimentiController::class,'reportCategorieAnnoXLS'])->name('budgetxls');
    Route::get('movimenti/test', [MovimentiController::class,'test']);
// CATEGORIE    
    Route::get('categorie', [CategorieController::class,'listCategorie'])->name('categorie');
    Route::post('categorie', [CategorieController::class,'insCategorie']);
    Route::get('catdelete', [CategorieController::class,'deleteCategorie']);
    Route::get('catmodify/{id}', [CategorieController::class,'updateCategorie']);
    Route::post('catmodify', [CategorieController::class,'updatePostCategorie']);
    
// Richiami di servizio da jquery
    Route::get('service/catlist', [CategorieController::class,'apiList']);
    Route::get('service/taglist', [TagController::class,'apiList']);
    
// TAGS    
    Route::get('tags', [TagController::class,'listTags'])->name('tags');
    Route::post('tags', [TagController::class,'insTags']);
    Route::get('tagmodify/{id}', [TagController::class,'updateTag']);
    Route::post('tagmodify', [TagController::class,'updatePostTag']);
// CONSUMI    
    Route::get('letturegas', [ContatoreGasController::class,'listLettureGas'])->name('gas');
    Route::post('letturegas', [ContatoreGasController::class,'insLettureGas']);
    Route::get('lettureenel', [ContatoreEnElController::class,'listLettureEnel'])->name('enel');
    Route::post('lettureenel', [ContatoreEnElController::class,'insLettureEnel']);
// MOVIMENTI
    Route::get('movimenti/filter/tags',[MovimentiController::class,'filterByTag']);    
    Route::get('movimenti/report/movimenti_categoria', [MovimentiController::class,'listMovPerCateg']);
    Route::get('movimenti/report/movimentibycat', [MovimentiController::class,'listMovbyCat']);
    Route::get('movdocs', [DocumentiController::class,'fileForm'])->name('documenti');
    Route::post('movdocs', [DocumentiController::class,'storeFile']);
    Route::get('movimenti/import', [MovimentiController::class,'importFile'])->name('importING');
    Route::post('movimenti/import', [MovimentiController::class,'importEC_ING']);
    Route::get('movimenti/importcr', [MovimentiController::class,'importFileCR'])->name('importCR');
    Route::post('movimenti/importcr', [MovimentiController::class,'importEC_CR']);
// AUTOMOBILI
    Route::get('auto', [AutoController::class, 'index'])->name('auto_list');
    Route::get('auto/new', [AutoController::class, 'newAuto'])->name('auto_new');
    Route::post('auto/new', [AutoController::class, 'saveAuto'])->name('auto_save');
    Route::get('auto/delete', [AutoController::class, 'delAuto']);
    Route::get('auto/detail', [AutoController::class, 'getAutoDetails']);
    Route::get('auto/rifornimento', [AutoController::class, 'rifornimentoAuto'])->name('auto_rifornimento');
    Route::post('auto/rifornimento', [AutoController::class, 'saveRifornimento']);
    Route::get('auto/revisione', [AutoController::class, 'revisioneAuto']);
    Route::post('auto/revisione', [AutoController::class, 'saveRevisione']);
    Route::get('auto/manutenzione', [AutoController::class, 'manutenzioneAuto']);
    Route::post('auto/manutenzione', [AutoController::class, 'saveManutenzione']);
    Route::get('auto/accessori', [AutoController::class, 'accessoriAuto']);
    Route::post('auto/accessori', [AutoController::class, 'saveAccessori']);
    Route::get('auto/operazioni', [AutoController::class, 'getOperazioni']);
    Route::get('auto/operazioni/pdf', [AutoController::class, 'exportPdfOperazioni']);
// CONTATTI
    Route::get('contatti', [AnagraficaController::class, 'listContact'])->name('contatti');
    Route::get('contatti/new', [AnagraficaController::class, 'newContact'])->name('newContact');
    Route::post('contatti/new', [AnagraficaController::class, 'insContact']);
    Route::get('contatti/modifica', [AnagraficaController::class, 'modifica']);
    Route::get('contatti/scheda', [AnagraficaController::class, 'getScheda']);
    Route::get('contatti/addOther', [AnagraficaController::class, 'insOtherContact']);
    Route::post('contatti/addOther', [AnagraficaController::class, 'saveOtherContact']);
// Gruppi e permessi
    Route::get('group/new', [Utenti::class, 'nuovoGruppo']);
    Route::post('group/new', [Utenti::class, 'saveNuovoGruppo']);
    Route::get('permesso/new', [Utenti::class, 'nuovoPermesso']);
    Route::post('permesso/new', [Utenti::class, 'saveNuovoPermesso']);
    Route::get('permesso/assign', [Utenti::class, 'vw_assignToGroup']);
    Route::post('permesso/assign', [Utenti::class, 'assignPermissionToGroup']);
// Progetti
    Route::get('progetti', [ProgettiController::class, 'listaProgetto'])->name('progetti');
    Route::post('progetti/new', [ProgettiController::class, 'salvaProgetto']);
    Route::get('progetti/new', [ProgettiController::class, 'nuovoProgetto'])->name('nuovoProgetto');
    Route::get('progetti/delete',[ProgettiController::class, 'deleteProgetto']);
    Route::get('progetti/delete_row/{id_row}/return/{id_prog}',[RigaProgettoController::class, 'deleterow']);
    Route::get('progetti/detail', [ProgettiController::class, 'dettaglioProgetto'])->name('detail');
    Route::post('progetti/detail', [RigaProgettoController::class, 'inserisciRiga']);
    Route::get('progetti/detail/edit/{id}', [RigaProgettoController::class, 'editRiga']);
    Route::post('progetti/rigaupdate', [RigaProgettoController::class, 'updateRiga']);
/// TEST routes
    Route::get('fullcalendar', [FullCalenderController::class, 'index']);
    Route::post('fullcalendar', [FullCalenderController::class, 'ajax']);
    Route::get('condominio',[CondominioController::class,'testPdf']);

    
