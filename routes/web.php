<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbarrotesController;
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
/*
Route::get('/abarrotestienda', function () {
    return view('abarrotestienda.index');
});
*/
Route::resource('abarrotestienda',AbarrotesController::class)->middleware('auth');
Auth::routes(['register'=>false,'reset'=>false]);
Route::get('/home', [AbarrotesController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function (){
    Route::get('/', [AbarrotesController::class, 'index'])->name('home');


});