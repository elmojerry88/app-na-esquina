<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function (Request $request) {
    return ['message' => 'funcionou'];
});



Route::get('/teste', [ProductController::class,'teste']);