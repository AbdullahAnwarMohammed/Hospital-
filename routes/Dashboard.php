<?php

use App\Http\Controllers\Dashboard\DectorController;
use App\Http\Controllers\Dashboard\SectionController;
use App\Http\Controllers\Dashboard\SingleServiceController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
//     return view('Dashboard.index');
// });

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
        
        ## Dashboard For Users  ##
        Route::get('/dashboard/user', function () {
            return view('Dashboard.user.dashboard');
        })->middleware(['auth'])->name('user.dashboard');
        
        ## Dashboard For Admin  ##
        Route::prefix('dashboard')->as('admin.')->middleware('auth:admin')->group(function(){
            Route::get('/admin', function () {
                return view('Dashboard.admin.dashboard');
            })->name('dashboard');

            Route::resource('sections', SectionController::class);
            Route::resource('dectors', DectorController::class);
            Route::post('update_password', [DectorController::class, 'update_password'])->name('update_password');
            Route::post('update_status', [DectorController::class, 'update_status'])->name('update_status');


            Route::resource('service', SingleServiceController::class);
            
        });
     

        
require __DIR__.'/auth.php';

    });


    




// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });
