<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    $project = \App\Models\Project::all();
    return view('welcome', compact('project'));
})->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/project', [App\Http\Controllers\HomeController::class, 'data'])->name('project');

Route::get('project/create',[App\Http\Controllers\HomeController::class,'create']);
Route::post('project/create',[App\Http\Controllers\HomeController::class,'store']);
Route::post('detail/create',[App\Http\Controllers\HomeController::class,'storeDetail']);
Route::get('project/{id}/detail', [App\Http\Controllers\HomeController::class,'detail'])->name('project.detail');
Route::get('project/{id}/category',[App\Http\Controllers\HomeController::class,'category'])->name('project.category');
Route::get('project/{id}/edit', [App\Http\Controllers\HomeController::class,'edit'])->name('project.edit');
Route::put('project/{id}', [App\Http\Controllers\HomeController::class,'update'])->name('project.update');
Route::delete('/project/{id}', [App\Http\Controllers\HomeController::class,'destroy'])->name('project.destroy');
