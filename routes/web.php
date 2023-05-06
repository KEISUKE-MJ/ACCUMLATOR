<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DailyreportController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function(){
    Route::get('/',[DailyreportController::class,'index'])->name('dailyreport.index');
    Route::get('/create',[DailyreportController::class,'create'])->name('dailyreport.create');
    Route::post('/store',[DailyreportController::class,'store'])->name('dailyreport.store');
    Route::get('/show/{id}',[DailyreportController::class,'show'])->name('dailyreport.show');
    Route::get('/show/{id}/edit',[DailyreportController::class,'edit'])->name('dailyreport.edit');
    Route::put('/show/{id}',[DailyreportController::class,'update'])->name('dailyreport.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
