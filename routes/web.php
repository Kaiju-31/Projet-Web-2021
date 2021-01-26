<?php


use App\Http\Controllers\HomeController;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', "GameController@index")
->name('games.index');

Route::resources([
    "game" => "GameController",
    "user" => "UserController",
    "purchase" => "PurchaseController",
    "home" => "HomeController",
    "cart" => "CartController",
    "checkout" => "CheckoutController"
]);

Route::get('admin/routes', 'HomeController@admin')->middleware('is_admin');
Route::get('admin/editEmail/{id}', 'HomeController@editEmail')->name('home.editEmail');
Route::get('admin/editPassword/{id}', 'HomeController@editPassword')->name('home.editPassword');
Route::get('admin/balance/{id}', 'HomeController@balance')->name('home.balance');

Route::patch('admin/updateBalance/{id}', 'HomeController@updateBalance')->name('home.updateBalance');

Auth::routes();

Route::post('/cart/add', 'CartController@store')->name('cart.store');
Route::get('/cart/{id}', 'CartController@show')->name('cart.show');
Route::patch('/cart/{rowId}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{rowId}', 'CartController@destroy')->name('cart.destroy');

Route::get('/merci', function () {
   return view('checkout.thankyou');
});
