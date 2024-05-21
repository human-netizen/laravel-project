<?php

use App\Models\Listing;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JudgeController;
use App\Http\Controllers\BattleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\ProblemController;
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
Route::get('/submit-solution/battle/{id}', function ($id) {
    return view('judge.cfindex' , ['id' => $id]);
});

Route::post('/submit-solution', [SolutionController::class, 'submitSolution'])->name('submitSolution');
Route::post('/submit-solution/battle/{id}', [SolutionController::class, 'submitSolutionById'])->name('submitSolutionById');

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
Route::get('/fetch-problems', [ProblemController::class, 'fetchProblems'])->name('problems.fetch');
Route::post('/notify-user', [ProblemController::class, 'notifyUser'])->name('notify.user');


Route::get('/profile/edit', [UserController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/update' , [UserController::class, 'update'])->name('profile.update')->middleware('auth');
Route::get('/profile/{id}', [UserController::class, 'show'])->name('profile.show');

Route::post('/profile/{id}/post', [UserController::class, 'createPost'])->name('profile.createPost')->middleware('auth');
Route::post('/profile/{id}/follow', [UserController::class, 'follow'])->name('profile.follow')->middleware('auth');
Route::post('/profile/{id}/unfollow', [UserController::class, 'unfollow'])->name('profile.unfollow')->middleware('auth');
Route::get('/register', [UserController::class, 'create'])->middleware('guest');;
Route::post('/users', [UserController::class, 'store']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);



Route::post('/battles/create', [BattleController::class, 'create'])->name('battles.create');
Route::post('/battles/accept/{id}', [BattleController::class, 'acceptBattle'])->name('battles.accept');
Route::post('/battles/reject/{id}', [BattleController::class, 'rejectBattle'])->name('battles.reject');
Route::get('/battleground', [BattleController::class, 'battleground'])->name('battleground');
Route::get('/battles/result/{id}', [BattleController::class, 'result'])->name('battles.result');
