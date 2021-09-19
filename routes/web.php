<?php

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

Route::get('/', function () {
    return view('auth.login');
});
\Illuminate\Support\Facades\Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('store', 'App\Http\Controllers\StoreController');
Route::resource('market', 'App\Http\Controllers\MarketController');
Route::resource('orders', 'App\Http\Controllers\OrdersController');
Route::resource('profile', 'App\Http\Controllers\ProfileController');
Route::resource('myorders', 'App\Http\Controllers\MyOrdersController');
Route::get('/status_show/{id}', 'App\Http\Controllers\OrdersController@show')->name('status_show');
Route::get('/status_update', 'App\Http\Controllers\OrdersController@status_update')->name('status_update');
Route::get('/edit_order/{id}', 'App\Http\Controllers\OrdersController@edit');
Route::get('/success', 'App\Http\Controllers\OrdersController@success');
Route::get('/pending', 'App\Http\Controllers\OrdersController@pending');
Route::get('/cancel', 'App\Http\Controllers\OrdersController@cancel');
Route::resource('archive', 'App\Http\Controllers\OrdersArchiveController');
Route::get('/orders_report', 'App\Http\Controllers\Orders_Report@index');
Route::get('/orders_report/Search', 'App\Http\Controllers\Orders_Report@Search');
Auth::routes();
Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', 'App\Http\Controllers\RoleController');
    Route::resource('users', 'App\Http\Controllers\UserController');

});
Route::get('/markAsRead', function(){

    auth()->user()->unreadNotifications->markAsRead();

    return redirect()->back();

})->name('mark');

Route::get('/{page}', 'App\Http\Controllers\AdminController@index');
