<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InterviewController;
use App\Http\Controllers\NoteController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//لانه صار الها ملف خاص فيها لازم اعرفها هون 
require __DIR__.'/auth.php';
// Route::get('/firstfile', function () {
//     return view('firstfile');
// });
//Route::get('/secondefile',[SecondeController::class,'secondeAction']);

//Route::get('/register', function () {
  //  return 'Welcome to the work page!';
//})->middleware('AdminMiddleware');
//Route::get('/secondefile', [SecondeController::class, 'secondeAction'])
 //   ->middleware('admin');

//الـ Route::resource سيولد لنا Routes الخاصة بالـ CRUD بدل ما نكتب السبعة يدويًا.
 Route::middleware('auth')->group(function () {
    Route::resource('applications', ApplicationController::class);
        Route::resource('companies', CompanyController::class);
            Route::resource('interviews', InterviewController::class);
Route::resource('notes', NoteController::class);
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');
});

