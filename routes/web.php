<?php

use App\Models\Listing;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProblemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SolutionController;
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

Route::get('/', [ListingController::class, 'index']);
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');
Route::post('/commentStore', [CommentController::class, 'store'])->middleware('auth');
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');
Route::put('/listings/{listing}', [ListingController::class, 'update'])->middleware('auth');
Route::delete('/listings/{listing}', [ListingController::class, 'destroy'])->middleware('auth');
Route::get('/listings/{listing}', [ListingController::class, 'show']);
Route::get('/register', [UserController::class, 'create'])->middleware('guest');;
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::get('/judgeme', [JudgeController::class, 'index']);
Route::get('judge/sample', function () {
    return view('judge.sample');
});
Route::get('userlist', [UserController::class, 'userList']);
//Route::get('/show-file', 'App\Http\Controllers\FileController@showFileContent');
Route::get('/getFileContents', 'App\Http\Controllers\FileController@showFileContent');
Route::get('/submit-solution', function () {
    return view('judge.cfindex');
});

Route::post('/submit-solution', [SolutionController::class, 'submitSolution'])->name('submitSolution');

Route::get('testSocket', [TestController::class, 'test']);
Route::view('bbb', 'checkingWebsocket');
Route::get('/pusher', function () {
    return view('checkingWebsocket');
});
Route::get('/userPost', [PostController::class, 'showForm']);
Route::post('/postSave', [PostController::class, 'save']);




Route::get('/send-message', function () {
    $message = 'Hello, this is a test message';
    broadcast(new MessageSent($message));
    return 'Message sent';
});
Route::get('/problems', [ProblemController::class, 'index'])->name('problems.index');
Route::post('/notify-user', [ProblemController::class, 'notifyUser'])->name('notify.user');

Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::post('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');
Route::post('/profile/{id}/post', [ProfileController::class, 'createPost'])->name('profile.createPost')->middleware('auth');
Route::post('/profile/{id}/follow', [ProfileController::class, 'follow'])->name('profile.follow')->middleware('auth');
Route::post('/profile/{id}/unfollow', [ProfileController::class, 'unfollow'])->name('profile.unfollow')->middleware('auth');


