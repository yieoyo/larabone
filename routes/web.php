<?php

use App\Http\Controllers\RoleController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\TestDBController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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
$installed = Storage::disk('public')->exists('installed');
if ($installed === true) {
    Route::get('/', function () {
        return view('layouts.app');
    });

    Auth::routes(['verify' => false]);

// Auth middleware for authenticated users
    Route::middleware(['auth'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');

        Route::post('users/{id}/force-delete', [App\Http\Controllers\UserController::class, 'forceDelete'])->name('users.forceDelete');
        Route::get('users/{id}/retrieve', [App\Http\Controllers\UserController::class, 'retrieveDeleted'])->name('users.retrieveDeleted');
        Route::put('users/{id}/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('users.changePassword');

        Route::resources(['users' => UserController::class, 'roles' => RoleController::class,]);
    });

} else {
    /*
    ------------------------------Install application-------------------------------
    */
    Route::get('/{url?}', function () {
        return redirect('/setup');
    })->where('url', '^(?!setup).*$');
    Route::get('/setup', [SetupController::class, 'viewSetup'])->name('viewSetup');
    Route::get('/setup/step-1', [SetupController::class, 'viewStep1'])->name('viewStep1');
    Route::get('/setup/step-2', [SetupController::class, 'viewStep2'])->name('viewStep2');
    Route::get('/setup/step-3', [SetupController::class, 'viewStep3'])->name('viewStep3');
    Route::get('/setup/step-4', [SetupController::class, 'viewStep3'])->name('viewStep4');
    Route::get('/setup/getNewAppKey', [SetupController::class, 'getNewAppKey'])->name('getNewAppKey');
    Route::post('/setup/testDB', [TestDBController::class, 'testDB'])->name('testDB');
    Route::post('/setup/step-2', [SetupController::class, 'setupStep1'])->name('setupStep1');
    Route::post('/setup/step-3', [SetupController::class, 'setupStep2'])->name('setupStep2');
    Route::post('/setup/step-4', [SetupController::class, 'setupStep3'])->name('setupStep3');
    Route::post('/setup/lastStep', [SetupController::class, 'lastStep'])->name('lastStep');
    Route::get('/setup/lastStep', function () {
        return redirect('/setup', 301);
    });
    Route::get('/setup/finish', function () {

        return view('setup.finished');
    });
}
