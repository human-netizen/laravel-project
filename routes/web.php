<?php

use App\Http\Controllers\CommentController;
use App\Models\Listing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\ListingController;

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

Route::get('/', [ListingController::class , 'index']);
Route::get('/listings/create' , [ListingController::class , 'create'])->middleware('auth');
Route::post('/listings' , [ListingController::class , 'store'])->middleware('auth');
Route::post('/commentStore' , [CommentController::class , 'store'])->middleware('auth');
Route::get('/listings/{listing}/edit' , [ListingController::class , 'edit'])->middleware('auth');
Route::put('/listings/{listing}' , [ListingController::class  , 'update'])->middleware('auth');
Route::delete('/listings/{listing}' , [ListingController::class , 'destroy'])->middleware('auth');
Route::get('/listings/{listing}' , [ListingController::class , 'show']);
Route::get('/register' , [UserController::class , 'create'])->middleware('guest');;
Route::post('/users' , [UserController::class , 'store']);
Route::post('/logout' , [UserController::class , 'logout'])->middleware('auth');
Route::get('/login' , [UserController::class , 'login'])->name('login');
Route::post('/users/authenticate' , [UserController::class , 'authenticate']);
Route::get('/judgeme' , [JudgeController::class , 'index']);
Route::get('judge/sample' , function (){
    return view('judge.sample');
});
Route::get('userlist' , [UserController::class , 'userList']);
//Route::get('/show-file', 'App\Http\Controllers\FileController@showFileContent');
Route::get('/getFileContents', 'App\Http\Controllers\FileController@showFileContent');


