<?php

use App\Http\Controllers\UnverstetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

