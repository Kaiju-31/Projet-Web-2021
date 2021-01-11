<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', "GameController@index");
Route::resources([
    "game" => "GameController"
]);

Route::get('admin/home', [HomeController::class, 'adminHome'])
    ->name('admin.home')->
    middleware('is_admin');

Auth::routes();

Route::get('/home', 'HomeController@index')
    ->name('home');
