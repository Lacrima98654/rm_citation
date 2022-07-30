<?php

use App\Http\Controllers\CitationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MusiqueController;
use App\Http\Controllers\PatnerController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [IndexController::class, 'index'])->name('home');
Route::get('mes-citations', [CitationController::class, 'index_public'])->name('citations');
Route::get('mes-musiques', [MusiqueController::class, 'index_public'])->name('musiques');
Route::get('mes-videos', [VideoController::class, 'index_public'])->name('videos');
Route::get('mes-partenaires', [PatnerController::class, 'index_public'])->name('patner');
Route::get('me-contacter', [ContactController::class, 'index'])->name('contact');

Route::prefix('admin')->group(function () {

  Route::get('/', [AdminController::class, 'index'])->name('admin.home');

  Route::get('/login', function () {
      /*if (session()->has('ADMIN'))
          return redirect()->route('admin');*/
      return view('admin.login');
  })->name('admin.login');

  Route::post('/login', [AdminController::class, 'login'])->name('admin.post.login');
  
  Route::resource('/citations', CitationController::class);
  Route::resource('videos', VideoController::class);
  Route::resource('partenaires', PatnerController::class);
  Route::resource('musiques', MusiqueController::class);

  Route::get('/newsletters', [AdminController::class, 'newsletters'])->name('newsletters.list');
  Route::get('/notifications', [AdminController::class, 'notifications'])->name('notifications.list');
  Route::get('/profil', [AdminController::class, 'profil'])->name('admin.profil');
});