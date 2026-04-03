<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [AdminController::class, 'dashboard']);
Route::get('/inventori', function () {
    return view('inventori');
});