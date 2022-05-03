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

Auth::routes();

Route::prefix('admin/products')->name('admin.products.trash.')->namespace('Trash')->group(function () {
    // Rotta per vedere la lista dei prodotti nel cestino
    Route::get('/trash', 'ProductController@index')->name('index');

    // Rotta per ripristinare una squadra
    Route::patch('/{product}/trash', 'ProductController@restore')->name('restore');

    // Metodo per eliminare definitivamente
    Route::delete('/{product}/destroy', 'ProductController@destroy')->name('destroy');
});

// * Tutte le rotte sono protette con il middleware auth
Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->namespace('Admin')
    ->group(function () {
        Route::get('/', 'HomeController@index')->name('home');


        Route::get('/statistics', 'UserController@statistics')->name('statistics.index');

        Route::resource('users', 'UserController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');
        Route::resource('orders', 'OrderController');


        Route::get('/{any}', function () {
            abort(404);
        })->where('any', '.*');
    });

Route::get('{any?}', function () {
    return view('guest.home');
})->where("any", ".*");
