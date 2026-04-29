<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprenticeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\TrainingCenterController;
use App\Http\Controllers\Consultas;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/consultas', function () {
    return "Funciona";
});

Route::get('/consultas',[Consultas::class,'consultas']);
Route::get('/apprentices',[ApprenticeController::class,'index']);
Route::get('/courses',[CourseController::class,'index']);
Route::get('/teachers',[TeacherController::class,'index']);
Route::get('/computers',[ComputerController::class,'index']);
Route::get('/areas',[AreaController::class,'index']);
Route::get('/trainingcenters',[TrainingCenterController::class,'index']);