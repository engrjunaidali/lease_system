<?php

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
use App\Property;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\pdfController;

// Authentication routes
Auth::routes();


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('/propertiesPDF', [pdfController::class, 'index']);
    Route::get('/propertiesPDF/{query}', [pdfController::class, 'search']);

});

// Include Wave Routes
Wave::routes();
