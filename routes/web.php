<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CubeController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IssueController;
use App\Models\Part;
use Illuminate\Support\Facades\Redis;

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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/support', [TicketController::class, 'create'])->name('support');


Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('parts', PartController::class);
    Route::get('/parts/{part}/delete', [PartController::class,'delete'])->name('parts.delete');

    Route::resource('categories', CategoryController::class);
    Route::get('/categories/{category}/delete', [CategoryController::class,'delete'])->name('categories.delete');

    Route::resource('cubes', CubeController::class);
    Route::get('/cubes/{cube}/delete', [CubeController::class,'delete'])->name('cubes.delete');
    Route::get('/cubes/{cube}/addparts', [CubeController::class,'addparts'])->name('cubes.addparts');
    Route::post('/cubes/{cube}/storeparts', [CubeController::class,'storeparts'])->name('cubes.storeparts');
    Route::get('/users/{cube}/removepart/{part}', [CubeController::class,'removepart'])->name('cubes.removepart');


    Route::resource('themes', ThemeController::class);
    Route::get('/themes/{theme}/delete', [ThemeController::class,'delete'])->name('themes.delete');

	Route::resource('users', UserController::class);
    Route::get('/users/{user}/delete', [UserController::class,'delete'])->name('users.delete');
    Route::get('/users/{user}/addrole', [UserController::class,'addRole'])->name('users.addrole');
    Route::post('/users/{user}/assignuserrole', [UserController::class,'assignUserRole'])->name('users.assignuserrole');
    Route::post('/users/{user}/removerole/{role}', [UserController::class,'removerole'])->name('users.removerole');

    Route::get('/tickets/handled', [TicketController::class,'handled'])->name('tickets.handled');
    Route::resource('tickets' ,  TicketController::class);

    Route::resource('issues' ,  IssueController::class);
    Route::get('/issues/{issue}/delete', [IssueController::class,'delete'])->name('issues.delete');

    Route::get('/dashboard', function () {
        $parts = Part::all();
        return view('admin.dashboard', compact('parts'));
    })->name('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\CubeController::class, 'getCubes'])->name('home');
