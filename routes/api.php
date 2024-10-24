<?php

use App\Http\Controllers\EditorController;
use App\Http\Controllers\OldStudentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnverstetController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;


Route::prefix('unverstet')->group(function () {
    Route::get('getall',[UnverstetController::class,'index']);
    Route::get('getOne/{id}',[UnverstetController::class,'getOne']);
    Route::put('update/{id}', [UnverstetController::class,'update']);
    Route::delete('delete/{id}',[UnverstetController::class,'delete']);
    Route::post('create', [UnverstetController::class,'create']);
});

Route::prefix('statistic')->group(function () {
    Route::get('getall',[StatisticController::class,'getAll']);
    Route::get('getOne/{id}',[StatisticController::class,'getOne']);
    Route::put('update/{id}', [StatisticController::class,'update']);
    Route::delete('delete/{id}',[StatisticController::class,'delete']);
    Route::post('create', [StatisticController::class,'create']);
});

Route::prefix('type')->group(function () {
    Route::get('getall',[TypeController::class,'getAll']);
    Route::get('getOne/{id}',[TypeController::class,'getOne']);
    Route::put('update/{id}', [TypeController::class,'update']);
    Route::delete('delete/{id}',[TypeController::class,'delete']);
    Route::post('create', [TypeController::class,'create']);
});

Route::prefix('editor')->group(function () {
    Route::get('getall',[EditorController::class,'getAll']);
    Route::get('getOne/{id}',[EditorController::class,'getOne']);
    Route::put('update/{id}', [EditorController::class,'update']);
    Route::delete('delete/{id}',[EditorController::class,'delete']);
    Route::post('create', [EditorController::class,'create']);
});

Route::prefix('user')->group(function () {
    Route::get('getall', [UserController::class, 'index']);
    Route::get('getOne/{id}', [UserController::class, 'getOne']);
    Route::post('create', [UserController::class, 'create']);
    Route::put('update/{id}', [UserController::class, 'update']);
    Route::delete('delete/{id}', [UserController::class, 'delete']);
});

Route::prefix('oldstudent')->group(function () {
    Route::get('getall',[OldStudentController::class,'getAll']);
    Route::get('getOne/{id}',[OldStudentController::class,'getOne']);
    Route::put('update/{id}', [OldStudentController::class,'update']);
    Route::delete('delete/{id}',[OldStudentController::class,'delete']);
    Route::post('create', [OldStudentController::class,'create']);
});

Route::prefix('program')->group(function () {
    Route::get('getall',[ProgramController::class,'getAll']);
    Route::get('getOne/{id} ',[ProgramController::class,'getOne']);
    Route::put('update/{id}', [ProgramController::class,'update']);
    Route::delete('delete/{id}',[ProgramController::class,'delete']);
    Route::post('create', [ProgramController::class,'create']);
});


Route::prefix('reslut')->group(function () {
    Route::get('getall',[ResultController::class,'getAll']);
    Route::delete('delete/{id}',[ResultController::class,'delete']);
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('refresh', [AuthController::class, 'refresh'])->name('auth.refresh');    
});