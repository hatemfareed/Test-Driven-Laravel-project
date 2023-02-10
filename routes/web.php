<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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

Route::post('/login', [LoginController::class, 'store']) ;
Route::patch('/login/home/{token}' ,[LoginController::class , 'getToken']) ;

Route::post('home/group', [GroupController::class, 'store']) ;
Route::patch('home/group/{group}', [GroupController::class, 'update']) ;
Route::delete('home/group/{group}', [GroupController::class, 'destroy']) ;

Route::post('/home/profile', [ProfileController::class, 'store']) ;
Route::patch('/home/profile/{profile}', [ProfileController::class, 'update']) ;

Route::post('/home/group/post', [PostController::class, 'store']) ;
Route::delete('/home/group/post/{post}', [PostController::class, 'destroy']) ;
