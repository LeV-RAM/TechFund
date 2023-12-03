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
Route::post('/', [ProjectController::class, 'terminateSession'])->name('logout');
Route::get('/testform', function () {
    return view('testform');
});
Route::post('/testform/regist', [ProjectController::class, 'addUser'])->name('register.user');

Route::post('/login', [ProjectController::class, 'authcheck'])->name('login.user');
Route::get('/home', [ProjectController::class, 'index'])->name('Home');
Route::get('/home/{id}', [ProjectController::class, 'viewProject'])->name('showProject');
Route::get('/home/{id}/funding', [ProjectController::class, 'fundProject'])->name('fundProj');
Route::get('/home/{id}/hiring', [ProjectController::class, 'hireSupp'])->name('hireProj');
Route::get('/home/{id}/{value}', [ProjectController::class, 'afterFund'])->name('backToProject');

// Route::get('/newproject', function () {
//     return view('newproject');
// });  

Route::get('/newproject', [ProjectController::class, 'viewNewProject'])->name('new.project');
Route::post('/newproject/project', [ProjectController::class, 'create'])->name('Store');

Route::get('/profilepage', [ProjectController::class, 'viewProfile'])->name('view.profile');







// Route::get('check1', function(){
//     return view('newproject');
// });