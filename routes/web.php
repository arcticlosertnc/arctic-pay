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


Route::namespace('Admin')->middleware(['auth'])->prefix('admin')->group(function () {
    
    
    Route::get('/', 'AdminController@index')->name('admin.home');
    Route::get('whichdraw', 'BalanceControler@whichdraw')->name('balance.whichdraw');
    Route::post('whichdraw', 'BalanceControler@whichdrawStore')->name('whichdraw.store');
    Route::get('balance', 'BalanceControler@index')->name('admin.balance');
    Route::get('deposit', 'BalanceControler@deposit')->name('balance.deposit');
    Route::post('deposit', 'BalanceControler@depositStore')->name('deposit.store');
    

});


//Route::get('admin', 'Admin\AdminController@index')->name('admin.home');
Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
