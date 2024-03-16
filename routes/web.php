<?php

use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\DetailElementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StandartTimeCalculationController;
use App\Http\Controllers\SubWorkElementController;
use App\Http\Controllers\WorkElementController;
use App\Http\Controllers\WorkerNeedController;
use App\Http\Controllers\WorkLoadController;
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
    return view('auth.login');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::get('/admin-dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'checkRole:admin'])->name('admin-dashboard');

Route::get('/head-div-dashboard', function () {
    return view('head_division.index');
})->middleware('auth')->name('head-div-dashboard');

Route::controller(WorkerNeedController::class)
    ->middleware('auth')
    ->prefix('head-div-dashboard')
    ->name('head-div.')
    ->group(function () {
        Route::get('/', 'index_head')->name('workerNeed.index');
        Route::get('/work-need', 'work_head')->name('workerNeed.work_head');
        Route::get('/download', 'downloadPDF')->name('workerNeed.downloadPDF');
    });


Route::name('admin.')->middleware(['auth', 'checkRole:admin'])->prefix('admin-dashboard')->group(function () {
    Route::controller(WorkElementController::class)->prefix('work-element')->group(function () {
        Route::get('/', 'index')->name('workElement.index');
        Route::get('/create',  'create')->name('workElement.create');
        Route::post('/store',  'store')->name('workElement.store');
        Route::get('/show/{id}',  'show')->name('workElement.show');
        Route::delete('/delete/{id}',  'delete')->name('workElement.delete');
    });

    Route::controller(SubWorkElementController::class)->prefix('sub-work-element')->group(function () {
        Route::post('/store',  'store')->name('subWorkElement.store');
    });

    Route::controller(StandartTimeCalculationController::class)->prefix('standart-time-calculation')->group(function () {
        Route::get('/',  'index')->name('standartTimeCalculation.index');
        Route::post('/store',  'store')->name('standartTimeCalculation.store');
        Route::put('/input-standart-time',  'input_standart_time')->name('standartTimeCalculation.input_standart_time');
    });

    Route::controller(DetailElementController::class)->prefix('average-time-calculation')->group(function () {
        Route::get('/',  'index')->name('averageElement.index');
    });

    Route::controller(WorkLoadController::class)->prefix('work-load')->group(function () {
        Route::get('/',  'index')->name('workLoad.index');
        Route::put('input/data',  'input_data')->name('workLoad.input_data');
    });

    Route::controller(WorkerNeedController::class)->prefix('worker-need')->group(function () {
        Route::get('/',  'index')->name('workerNeed.index');
        Route::put('/store',  'store')->name('workerNeed.store');
    });

    Route::controller(CompanyProfileController::class)->prefix('company')->group(function () {
        Route::get('/', 'index')->name('companyProfile.index');
        Route::put('/update', 'update')->name('companyProfile.update');
    });
});
