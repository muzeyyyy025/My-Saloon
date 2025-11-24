<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ApiRequired;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/appointments', function () {
    return "You Are Authorized";
})->middleware(ApiRequired::class);