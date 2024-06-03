<?php

use App\Http\Controllers\Absence\AbsenceController;
use App\Http\Controllers\Allowance\AllowanceController;
use App\Http\Controllers\CompanyProfileController;
use App\Http\Controllers\Conclusion\ConclusionController;
use App\Http\Controllers\DetailElementController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingFactor\RatingFactorController;
use App\Http\Controllers\StandartTimeCalculationController;
use App\Http\Controllers\SubWorkElementController;
use App\Http\Controllers\WFA\WFAController;
use App\Http\Controllers\WLA\WLAController;
use App\Http\Controllers\WorkElement\WorkElementController;
use App\Http\Controllers\WorkerNeedController;
use App\Http\Controllers\WorkLoadController;
use App\Http\Controllers\WorkStation\WorkStation;
use App\Http\Controllers\WorkStation\WorkStationController;
use App\Http\Controllers\WorkStation\WorkStationDetailController;
use App\Models\Absence;
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

// Route::controller(WorkerNeedController::class)
//     ->middleware('auth')
//     ->prefix('head-div-dashboard')
//     ->name('head-div.')
//     ->group(function () {
//         Route::get('/', 'index_head')->name('workerNeed.index');
//         Route::get('/work-need', 'work_head')->name('workerNeed.work_head');
//         Route::get('/download', 'downloadPDF')->name('workerNeed.downloadPDF');
//     });


Route::name('admin.')->middleware(['auth', 'checkRole:admin'])->prefix('admin-dashboard')->group(function () {
    // Route::controller(WorkElementController::class)->prefix('work-element')->group(function () {
    //     Route::get('/', 'index')->name('workElement.index');
    //     Route::get('/create',  'create')->name('workElement.create');
    //     Route::post('/store',  'store')->name('workElement.store');
    //     Route::get('/show/{id}',  'show')->name('workElement.show');
    //     Route::delete('/delete/{id}',  'delete')->name('workElement.delete');
    // });

    // Route::controller(SubWorkElementController::class)->prefix('sub-work-element')->group(function () {
    //     Route::post('/store',  'store')->name('subWorkElement.store');
    // });

    // Route::controller(StandartTimeCalculationController::class)->prefix('standart-time-calculation')->group(function () {
    //     Route::get('/',  'index')->name('standartTimeCalculation.index');
    //     Route::post('/store',  'store')->name('standartTimeCalculation.store');
    //     Route::put('/input-standart-time',  'input_standart_time')->name('standartTimeCalculation.input_standart_time');
    // });

    // Route::controller(DetailElementController::class)->prefix('average-time-calculation')->group(function () {
    //     Route::get('/',  'index')->name('averageElement.index');
    // });

    // Route::controller(WorkLoadController::class)->prefix('work-load')->group(function () {
    //     Route::get('/',  'index')->name('workLoad.index');
    //     Route::put('input/data',  'input_data')->name('workLoad.input_data');
    // });

    // Route::controller(WorkerNeedController::class)->prefix('worker-need')->group(function () {
    //     Route::get('/',  'index')->name('workerNeed.index');
    //     Route::put('/store',  'store')->name('workerNeed.store');
    // });

    // CRUD Stasiun Kerja
    Route::resource('work-station', WorkStationController::class);
    Route::prefix('work-station')->group(function () {
        Route::resource('detail', WorkStationDetailController::class);
    });

    Route::controller(WorkElementController::class)->prefix('work-element')->group(function () {
        Route::get('/', 'index')->name('workElement.index');
        // Route::get('/create', 'create')->name('workElement.create');
        // Route::post('/store', 'store')->name('workElement.store');
        Route::get('/show/{id}', 'show')->name('workElement.show');
        Route::get('/create/{id}', 'create')->name('workElement.create');
        Route::post('/store/{id}', 'store')->name('workElement.store');

        // Route::delete('/delete/{id}', 'delete')->name('workElement.delete');
    });

    Route::controller(RatingFactorController::class)->prefix('rating-factor')->group(function () {
        Route::get('/', 'index')->name('ratingFactor.index');
        Route::get('/create/{id}', 'create')->name('ratingFactor.create');
        Route::post('/store', 'store')->name('ratingFactor.store');
        Route::get('/edit/{id}', 'edit')->name('ratingFactor.edit');
        Route::put('/update/{id}', 'update')->name('ratingFactor.update');
    });

    Route::resource('allowance', AllowanceController::class);


    Route::controller(AllowanceController::class)->prefix('allowance')->group(function () {
        Route::get(
            '/create-allowance/{id}',
            'createAllowance'
        )->name('allowance.create-allowance');
    });


    Route::prefix('wla')->group(function () {
        Route::get('/', [WLAController::class, 'index'])->name('wla.index');
        Route::get('/create', [WLAController::class, 'create'])->name('wla.create');
        Route::post('/update/{id}', [WLAController::class, 'update'])->name('wla.update');
        Route::get('/edit/{id}', [WLAController::class, 'edit'])->name('wla.edit');
        Route::get('/generateData', [WLAController::class, 'generateData'])->name('wla.generateData');
    });




    Route::controller(CompanyProfileController::class)->prefix('company')->group(function () {
        Route::get('/', 'index')->name('companyProfile.index');
        Route::put('/update', 'update')->name('companyProfile.update');
    });
    Route::resource('absence', AbsenceController::class);
    Route::resource('wfa', WFAController::class);

    Route::get('/data-generate/generateData', [WFAController::class, 'generateData'])->name('generateData-wfa');

    Route::get('/absence/create/{id}', [AbsenceController::class, 'createAbs'])->name('absence.createAbs');

    Route::controller(ConclusionController::class)->prefix('conclusion')->group(function () {
        Route::get('/', 'index')->name('conclusion.index');
        Route::get('/generatePDF', 'generatePDF')->name('conclusion.generatePDF');
        // Route::put('/update', 'update')->name('companyProfile.update');
    });
});
