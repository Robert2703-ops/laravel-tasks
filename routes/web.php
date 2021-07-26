<?php

use App\Http\Controllers\TasksController;
use App\Http\Controllers\UsersController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');

// USER
Route::get('/login', [UsersController::class, 'login'])->name('login');
Route::post('/login', [UsersController::class, 'authenticate'])->name('login');

Route::get('/register', [UsersController::class, 'register'])->name('register');
Route::post('/register', [UsersController::class, 'store'])->name('register');

// Dashboard, logout
Route::group([
    'middleware' => 'auth'
], function (){
    Route::get('/dashboard', [TasksController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [TasksController::class, 'logout']);
});

// AUTH
Route::group([
    'middleware' => 'auth',
    'prefix' => '/dashboard'
], function () {

    // Update users info
    Route::put('/updatePassword', [UsersController::class, 'updatePassword']);
    Route::put('/updateName', [UsersController::class, 'updateName']);

    // Dashboard functions
    Route::get('/user', [TasksController::class, 'userPlace'])->name('user');

    //CRUD tasks
    
    //post
    Route::post('/storeTask', [TasksController::class, 'storeTask'])->name('createTask');
    
    //put
    Route::get('/changeTask/{id}', [TasksController::class, 'changeTask'])->name('changeTask');
    Route::put('/updateTask{id}', [TasksController::class, 'updateTask'])->name('updateTask');

    //done task
    Route::put('/{id}', [TasksController::class, 'doneTask'])->name('done');

    //delete
    Route::delete('/{id}', [TasksController::class, 'deleteTask'])->name('deleteTask');
});