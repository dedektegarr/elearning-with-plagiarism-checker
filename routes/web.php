<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\SubmissionController;
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

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('pages.dashboard.index', ['title' => 'Dashboard']);
    })->name('dashboard.index');

    Route::get('/subjects', [SubjectController::class, 'index'])->name('subject.index');
    Route::get('/subjects/{subject}', [SubjectController::class, 'show'])->name('subject.show');
    Route::get('/subjects/{subject}/topics', [SubjectController::class, 'show'])->name('subject.show');
    // Route::get('/subjects/{subject}/topics/{topic}', [SubjectController::class, 'assignment'])->name('subject.assignment');


    Route::get('/submissions', [SubmissionController::class, 'index'])->name('submission.index');
    Route::get('/submissions/{topic}', [SubmissionController::class, 'show'])->name('submission.show');
    Route::get('/submissions/{submission}/{username}', [SubmissionController::class, 'studentSubmission'])->name('submission.student');



    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
});
