<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WorkerController;
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

    Route::get('/workers', [WorkerController::class, 'index'])->name('worker.index');
    Route::post('/storeWorkerView', [WorkerController::class, 'store'])->name('worker.store');
    Route::get('/createWorkerView', [WorkerController::class, 'create'])->name('worker.create');
    Route::get('/getWorker/{worker}', [WorkerController::class, 'show'])->name('worker.show');
    Route::put('/editWorker/{worker}', [WorkerController::class, 'edit'])->name('worker.edit');
    Route::get('/deleteWorker/{worker}', [WorkerController::class, 'destroy']);
});

require __DIR__.'/auth.php';
