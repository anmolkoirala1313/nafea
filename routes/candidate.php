<?php

use App\Http\Controllers\Candidate\CandidateInfoController;
use App\Http\Controllers\Candidate\DashboardController;
use App\Http\Controllers\Candidate\Login\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
| Here is where you can register backend routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth']);

Route::post('/information-list/data', [CandidateInfoController::class,'getDataForDataTable'])->name('information_list.data');
Route::get('/information-list/trash', [CandidateInfoController::class,'trash'])->name('information_list.trash');
Route::post('/information-list/trash/{id}/restore', [CandidateInfoController::class,'restore'])->name('information_list.restore');
Route::delete('/information-list/trash/{id}/remove', [CandidateInfoController::class,'removeTrash'])->name('information_list.remove-trash');
Route::resource('information-list', CandidateInfoController::class)->names('information_list')->middleware(['auth']);

