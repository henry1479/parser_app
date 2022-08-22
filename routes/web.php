<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\CarsController;
use App\Http\Controllers\ParserController;

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
    return view('welcome');
})->name('welcome');




Route::group(['as'=>'parser.', 'prefix' => 'parser'], function() {
    Route::get('/{title}', [ParserController::class, 'store'])->name('data');
});