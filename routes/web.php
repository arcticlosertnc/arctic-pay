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


Route::namespace('Admin')->middleware(['auth'])->prefix('admin')->group(function () { //grupo de rotas 
    
    
    Route::get('/', 'AdminController@index')->name('admin.home'); //rota index
    
    Route::get('historic', 'BalanceControler@historic')->name('admin.historic');
    Route::any('historic-search', 'BalanceControler@searchHistoric')->name('historic.search');

    Route::get('whichdraw', 'BalanceControler@whichdraw')->name('balance.whichdraw'); 
    Route::post('whichdraw', 'BalanceControler@whichdrawStore')->name('whichdraw.store');
    
    Route::get('balance', 'BalanceControler@index')->name('admin.balance');
    
    Route::get('deposit', 'BalanceControler@deposit')->name('balance.deposit');
    Route::post('deposit', 'BalanceControler@depositStore')->name('deposit.store');
    
    Route::get('transfer', 'BalanceControler@transfer')->name('balance.transfer');
    Route::post('transfer', 'BalanceControler@transferStore')->name('transfer.store');
    Route::post('confirm-transfer', 'BalanceControler@confirmTransfer')->name('confirm.transfer');
    

});
//Rota para o perfil 
Route::get('meu-perfil', 'Admin\UserController@profile')->name('profile')->middleware('auth');
//Rota para atualizar o perfil 
Route::post('atualiza-perfil', 'Admin\UserController@profileUpdate')->name('profile.update')->middleware('auth');
//Route::get('admin', 'Admin\AdminController@index')->name('admin.home');
Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
