<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SecondeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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


Route::get('/secondes', [SecondeController::class, 'index']);