<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdemDeServicosController;

Route::get('/', function () {
    return view('home');
});

Route::resource('ordem_de_servicos', OrdemDeServicosController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
