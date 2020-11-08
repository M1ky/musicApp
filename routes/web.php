<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\TracksController;
use App\Http\Controllers\ReportsController;

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

Route::get('/', function ()
{
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users/{id}', [App\Http\Controllers\UsersController::class, 'show'])->name('users');



Route::get('/authors', [AuthorsController::class, 'index']);
Route::post('/authors', [AuthorsController::class, 'store']);
Route::get('/authors/create', [AuthorsController::class, 'create']);
Route::get('/authors/{author}', [AuthorsController::class, 'show']);
Route::get('/authors/{author}/edit', [AuthorsController::class, 'edit']);
Route::put('/authors/{author}', [AuthorsController::class, 'update']);
Route::get('/authors/{author}/delete', [AuthorsController::class, 'delete']);
Route::delete('/authors/{author}', [AuthorsController::class, 'destroy']);


Route::get('/tracks', [TracksController::class, 'index']);
Route::post('/tracks', [TracksController::class, 'store']);
Route::get('/tracks/create', [TracksController::class, 'create']);
Route::get('/tracks/{track}', [TracksController::class, 'show']);
Route::get('/tracks/{track}/edit', [TracksController::class, 'edit']);
Route::put('/tracks/{track}', [TracksController::class, 'update']);
Route::get('/tracks/{track}/delete', [TracksController::class, 'delete']);
Route::delete('/tracks/{track}', [TracksController::class, 'destroy']);


Route::get('/reports', [ReportsController::class, 'index']);
Route::post('/reports', [ReportsController::class, 'store']);
Route::get('/reports/create', [ReportsController::class, 'create']);
Route::get('/reports/{report}', [ReportsController::class, 'show']);
Route::get('/reports/{report}/edit', [ReportsController::class, 'edit']);
Route::get('/reports/{report}/print', [ReportsController::class, 'print']);
Route::put('/reports/{report}', [ReportsController::class, 'update']);
Route::get('/reports/{report}/delete', [ReportsController::class, 'delete']);
Route::delete('/reports/{report}', [ReportsController::class, 'destroy']);
Route::get('/reports/{report}/createBasedOn', [ReportsController::class, 'createBasedOn']);
Route::get('/reports/{report}/{track}/delete', [ReportsController::class, 'getDeleteTrackFromReportView']);
Route::delete('/reports/{report}/{track}/delete', [ReportsController::class, 'deleteTrackFromReport']);
Route::get('/reports/{report}/{track}/editBroadcast', [ReportsController::class, 'getEditBroadcast']);
Route::post('/reports/{report}/{track}/editBroadcast', [ReportsController::class, 'editBroadcast']);
