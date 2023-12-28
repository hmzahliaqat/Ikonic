<?php

use App\Http\Controllers\comments\create as CommentsCreate;
use App\Http\Controllers\comments\fetch as CommentsFetch;
use App\Http\Controllers\feedback\create;
use App\Http\Controllers\feedback\fetch;
use App\Http\Controllers\main;
use App\Http\Controllers\notifications;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\tasks;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/d', function () {
    return view('dashboard');
});

//Feedback
Route::post('/create',[create::class,'create']);
Route::get('/getFeedbacks',[fetch::class,'fetch']);
Route::get('/feedbackItem/{id}',[fetch::class,'feedbackItem']);


//comments
Route::post('/createComment/{id}',[CommentsCreate::class,'create']);
Route::get('/getComments',[CommentsFetch::class,'fetch']);
Route::post('/disable/{id}',[main::class,'disable']);
Route::post('/enable/{id}',[main::class,'enable']);


//getUser
Route::get('getAuthUser',[main::class,'getAuth']);

//Votes
Route::post('createVote/{id}',[main::class,'createVote']);
Route::get('getVotes/{id}',[main::class,'getVote']);

//Dashboard
Route::get('/getUsers',[main::class,'getUsers']);
Route::post('/delUsers/{id}',[main::class,'delUser']);
Route::get('/getFeed',[main::class,'getFeed']);
Route::post('/delFeedback/{id}',[main::class,'delf']);

Route::get('/getOtherUsers',[main::class,'getOtherUsers']);




















Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
