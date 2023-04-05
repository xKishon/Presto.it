<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;

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

Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
// ROTTA PROFILE
Route::get('/profile', [PublicController::class, 'profile'])->name('profile');

// ROTTE ARTICLE
Route::get('article/index', [PublicController::class, 'index'])->name('article.index');
Route::get('article/create', [PublicController::class, 'create'])->name('article.create')->middleware('auth');
Route::get('/article/show/{article}', [PublicController::class, 'show'])->name('article.show');
Route::get('/article/showOffer/{offer}', [PublicController::class, 'showOffer'])->name('offer.show');
Route::get('/article/show/category/{category}', [PublicController::class, 'categoryShow'])->name('category.show');
Route::get('/article/edit/{article}', [PublicController::class, 'edit'])->name('article.edit');
Route::get('/article/contactseller/{article}', [PublicController::class, 'contactSeller'])->name('article.contactSeller');
Route::post('/article/contactSellerSubmit', [PublicController::class, 'contactSellerSubmit'])->name('article.contactSellerSubmit');
Route::delete('/user/destroy', [PublicController::class, 'destroy'])->name('user.destroy');
// Route::post('//contactseller/{article}', [PublicController::class, 'contactSeller'])->name('article.contactSeller');

// rotta home revisore
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
// rotta accetta annuncio
Route::patch('/accept/article/{article}', [RevisorController::class, 'acceptarticle'])->middleware('isRevisor')->name('revisor.accept_article');
// rotta rifiuta annuncio
Route::patch('/reject/article/{article}', [RevisorController::class, 'rejectarticle'])->middleware('isRevisor')->name('revisor.reject_article');

// Rotta richiedi di diventare revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
// rotta rendi utente revisore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->middleware('auth')->name('make.revisor');

// rotte ricerca annuncio
Route::get('/search/article', [PublicController::class, 'searchArticles'])->name('search.articles');

// rotte per eliminare l'ultima operazione
Route::patch('/revisor/undo', [RevisorController::class, 'undo'])->name('undoLast');

//rotte language
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('set_language_locale');
