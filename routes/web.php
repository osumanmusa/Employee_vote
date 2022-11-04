<?php

  

use Illuminate\Support\Facades\Route;

  

use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\AdminRegController;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\RegformsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\PrimeregController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecruitController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\admin\SignedrouteController;
use App\Http\Controllers\admin\ElectionController;

  

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

});
Route::get('admin/register', function () {

    return view('admin.auth.register');

});
Route::get('admin/login', function () {

    return view('admin.auth.login');

});
Route::get('manager/register', function () {

    return view('manager.auth.register');

});
Route::get('manager/login', function () {

    return view('manager.auth.login');

});
  

Route::post('/login',[LoginController::class, 'login'])->name('login');
Route::post('/user-register',[RegisterController::class, 'create'])->name('user.register');

Route::post('/admin.register',[AdminRegController::class, 'create'])->name('admin.register');
Route::post('/admin.login',[AdminLoginController::class, 'login'])->name('admin.login');

Route::get('/userlog',[SignedrouteController::class, 'login'])->name('getlogin')->middleware('signed');

Auth::routes();

  

/*------------------------------------------

--------------------------------------------

All Normal Users Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:user'])->group(function () {

  

    Route::get('/user/home', [HomeController::class, 'index'])->name('user.home');


    Route::get('/vote-store/{id}', [App\Http\Controllers\VotesController::class, 'store'])->name('store-vote');  
    
    Route::get('/vote-undo/{id}', [App\Http\Controllers\VotesController::class, 'unvote'])->name('undo-vote');  

    Route::get('/user/edit-profile', [ProfileController::class, 'index'])->name('user.profile.edit');
    Route::post('/user/update-profile/{id}', [ProfileController::class, 'update'])->name('user.profile.update');




});

  

/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:admin'])->group(function () {

  

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');

    Route::get('/admin/elections-list', [App\Http\Controllers\admin\ElectionController::class, 'index'])->name('admin.list-elections');
    Route::post('/admin/elections-store', [App\Http\Controllers\admin\ElectionController::class, 'store'])->name('admin.store-elections');    
    Route::get('/admin/elections-stop/{id}', [App\Http\Controllers\admin\ElectionController::class, 'stop'])->name('admin.stop-electionss');    
    Route::get('/admin/elections-start/{id}', [App\Http\Controllers\admin\ElectionController::class, 'start'])->name('admin.start-electionss');


    Route::get('/admin/vote', [App\Http\Controllers\admin\VotesController::class, 'index'])->name('admin.vote');
    Route::get('/admin/vote-store/{id}', [App\Http\Controllers\admin\VotesController::class, 'store'])->name('admin.store-vote');    

    Route::get('/admin/users-list', [App\Http\Controllers\admin\UsersController::class, 'index'])->name('admin.list-users');
    Route::post('/admin/users-store', [App\Http\Controllers\admin\UsersController::class, 'store'])->name('admin.store-users');
    Route::get('/admin/users-delete/{id}', [App\Http\Controllers\admin\UsersController::class, 'destroy'])->name('admin.delete-users');
    Route::post('/admin/update-user/{id}', [App\Http\Controllers\admin\ProfileController::class, 'updateuser'])->name('admin.userprofile.update');




    Route::get('/admin/departments', [App\Http\Controllers\admin\DepartmentController::class, 'index'])->name('admin.department.list');
    Route::get('/admin/create-departments', [App\Http\Controllers\admin\DepartmentController::class, 'create'])->name('admin.department.create');
    Route::post('/admin/store-departments', [App\Http\Controllers\admin\DepartmentController::class, 'store'])->name('admin.department.store');


    Route::get('/admin/edit-profile/{id}', [App\Http\Controllers\admin\ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/admin/update-profile/{id}', [App\Http\Controllers\admin\ProfileController::class, 'update'])->name('admin.profile.update');

        Route::get('/admin/edit-user/{id}', [App\Http\Controllers\admin\ProfileController::class, 'edituser'])->name('admin.userprofile.edit');


});

  

/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:manager'])->group(function () {

  

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');

});

 