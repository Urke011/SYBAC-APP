<?php

use App\Constants\Countries;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SubsectionController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    if (Auth::check()) return redirect('/dashboard');

    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('customers', CustomerController::class)->parameters([
        'customers' => 'id'
    ]);
    Route::resource('inquiries', InquiryController::class)->parameters([
        'inquiries' => 'id'
    ]);
    Route::resource('subsections', SubsectionController::class)->parameters([
        'subsections' => 'id'
    ]);
    Route::resource('components', ComponentController::class)->parameters([
        'components' => 'id'
    ]);
    Route::resource('calculations', CalculationController::class)->parameters([
        'calculations' => 'id'
    ]);

    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');


    Route::get('/offers', function () {
        return view('pages.offers.index');
    })->name('offers.index');
});


// Route::get('/countries', function()
// {
//     return collect(Countries::getAll())->pluck('value', 'key');
// });


require __DIR__ . '/auth.php';
