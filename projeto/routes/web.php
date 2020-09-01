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

Route::get('/', 'Auth\LoginController@showLoginForm');

Auth::routes([
    'register' => false
]);

Route::middleware('auth')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('empresas', 'EmpresaController');
    Route::resource('produtos', 'ProdutosController');
    Route::resource('users', 'UsersController');
    Route::resource('movimentos_financeiros', 'MovimentoFinanceiroController');
    Route::post('/empresas/buscar-por/nome', 'Selects\EmpresaNomeTipo');

});


