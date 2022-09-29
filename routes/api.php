<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/auth/register', [UserController::class, 'register']);
Route::post('/auth/login', [UserController::class, 'login']);
Route::post('/auth/perfil', [UserController::class, 'perfil']);

Route::get('/group',[GroupController::class,'getGroup']);

Route::post('/group/addUser', [GroupController::class, 'addUserGroup']);

Route::post('/note',[NoteController::class,'addNote']);

Route::get('/note/filter', [NoteController::class, 'filterNote']);
