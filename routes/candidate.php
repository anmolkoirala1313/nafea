<?php

use App\Http\Controllers\Candidate\Agency\AuthorizedAgencyController;
use App\Http\Controllers\Candidate\Agency\LaborRepresentativeController;
use App\Http\Controllers\Candidate\Agency\ProprietorController;
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

Route::get('/authorized-agency/index', [AuthorizedAgencyController::class,'index'])->name('authorized_agency.index');
Route::put('/authorized-agency/{id}/update/', [AuthorizedAgencyController::class,'update'])->name('authorized_agency.update');

Route::prefix('authorized-agency/')->name('authorized_agency.')->middleware(['auth'])->group(function () {
    //proprietor
    Route::get('/proprietor/trash', [ProprietorController::class,'trash'])->name('proprietor.trash');
    Route::post('/proprietor/trash/{id}/restore', [ProprietorController::class,'restore'])->name('proprietor.restore');
    Route::delete('/proprietor/trash/{id}/remove', [ProprietorController::class,'removeTrash'])->name('proprietor.remove-trash');
    Route::resource('proprietor', ProprietorController::class)->names('proprietor');

    //labor representative
    Route::get('/labor-representative/trash', [LaborRepresentativeController::class,'trash'])->name('labor_representative.trash');
    Route::post('/labor-representative/trash/{id}/restore', [LaborRepresentativeController::class,'restore'])->name('labor_representative.restore');
    Route::delete('/labor-representative/trash/{id}/remove', [LaborRepresentativeController::class,'removeTrash'])->name('labor_representative.remove-trash');
    Route::resource('labor-representative', LaborRepresentativeController::class)->names('labor_representative');


});
