<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;


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
    return view('login');
});
Route::post('/login', [ProjectController::class, 'authcheck'])->name('login.user');

Route::get('/newproject', [ProjectController::class, 'viewNewProject'])->name('new.project');
Route::get('/profile', [ProjectController::class, 'viewProfile'])->name('view.profile');

Route::post('/', [ProjectController::class, 'terminateSession'])->name('logout');

// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/home', [ProjectController::class, 'index'])->name('Home');
Route::post('/home', [ProjectController::class, 'create'])->name('Store');

Route::get('/testform', function () {
    return view('testform');
});

Route::get('/profilepage', function () {
    return view('profilepage');
});

Route::get('/newproject', function () {
    return view('newproject');
});

Route::post('/testform/regist', [ProjectController::class, 'addUser'])->name('register.user');

Route::get('check1', function(){
    return view('newproject');
});