<?php

use App\Http\Controllers\EditorController;
use App\Http\Controllers\OldStudentController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UnverstetController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('unverstet')->group(function () {
    Route::get('getall',[UnverstetController::class,'index']);
    Route::get('getOne',[UnverstetController::class,'getOne']);
    Route::put('update/{id}', [UnverstetController::class,'update']);
    Route::delete('delete/{id}',[UnverstetController::class,'delete']);
    Route::post('create', [UnverstetController::class,'create']);
});

Route::prefix('statistic')->group(function () {
    Route::get('getall',[StatisticController::class,'getAll']);
    Route::get('getOne',[StatisticController::class,'getOne']);
    Route::put('update/{id}', [StatisticController::class,'update']);
    Route::delete('delete/{id}',[StatisticController::class,'delete']);
    Route::post('create', [StatisticController::class,'create']);
});

Route::prefix('type')->group(function () {
    Route::get('getall',[TypeController::class,'getAll']);
    Route::get('getOne',[TypeController::class,'getOne']);
    Route::put('update/{id}', [TypeController::class,'update']);
    Route::delete('delete/{id}',[TypeController::class,'delete']);
    Route::post('create', [TypeController::class,'create']);
});

Route::prefix('editor')->group(function () {
    Route::get('getall',[EditorController::class,'getAll']);
    Route::get('getOne',[EditorController::class,'getOne']);
    Route::put('update/{id}', [EditorController::class,'update']);
    Route::delete('delete/{id}',[EditorController::class,'delete']);
    Route::post('create', [EditorController::class,'create']);
});

Route::prefix('user')->group(function () {
    Route::get('getall',[UserController::class,'getAll']);
    Route::get('getOne',[UserController::class,'getOne']);
    Route::put('update/{id}', [UserController::class,'update']);
    Route::delete('delete/{id}',[UserController::class,'delete']);
    Route::post('create', [UserController::class,'create']);
});

Route::prefix('oldstudent')->group(function () {
    Route::get('getall',[OldStudentController::class,'getAll']);
    Route::get('getOne',[OldStudentController::class,'getOne']);
    Route::put('update/{id}', [OldStudentController::class,'update']);
    Route::delete('delete/{id}',[OldStudentController::class,'delete']);
    Route::post('create', [OldStudentController::class,'create']);
});

Route::prefix('program')->group(function () {
    Route::get('getall',[ProgramController::class,'getAll']);
    Route::get('getOne',[ProgramController::class,'getOne']);
    Route::put('update/{id}', [ProgramController::class,'update']);
    Route::delete('delete/{id}',[ProgramController::class,'delete']);
    Route::post('create', [ProgramController::class,'create']);
});