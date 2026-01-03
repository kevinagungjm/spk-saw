<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProgramStudiController;
use App\Http\Controllers\SawController;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [SawController::class, 'form'])->name('form');
Route::get('/saw', [SawController::class, 'form'])->name('saw.form');
Route::post('/saw', [SawController::class, 'calculate'])->name('saw.calculate');

/*
|--------------------------------------------------------------------------
| Admin (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/prodi', [ProgramStudiController::class, 'index'])->name('prodi.index');
    Route::get('/prodi/create', [ProgramStudiController::class, 'create'])->name('prodi.create');
    Route::post('/prodi', [ProgramStudiController::class, 'store'])->name('prodi.store');
    Route::get('/prodi/{id}/edit', [ProgramStudiController::class, 'edit'])->name('prodi.edit');
    Route::put('/prodi/{id}', [ProgramStudiController::class, 'update'])->name('prodi.update');
    Route::delete('/prodi/{id}', [ProgramStudiController::class, 'destroy'])->name('prodi.destroy');

});
require __DIR__.'/auth.php';
