<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContainerController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', [AdminController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('isLoggedIn');
Route::get('/login', [AuthController::class, 'login'])->middleware('alreadyLoggedIn');
Route::post('/login-admin', [AuthController::class, 'loginAdmin']);
Route::get('/logout',[AuthController::class , 'logout']);


// users

Route::resource('/users', UserController::class)->middleware('isLoggedIn');
Route::get('/user/container/{id}', [ContainerController::class,'container'])->name('users.container')->middleware('isLoggedIn');
Route::get('/user/container/create/{id}', [ContainerController::class,'containerCreate'])->name('containers.create')->middleware('isLoggedIn');
Route::post('/fund/{id}', [ContainerController::class,'storeFund'])->name('fund.store')->middleware('isLoggedIn');
Route::post('/store/container/{id}', [ContainerController::class,'storeContainer'])->name('containers.store')->middleware('isLoggedIn');
Route::delete('/container/delete/{id}', [ContainerController::class,'deleteContainer'])->name('containers.destroy')->middleware('isLoggedIn');
Route::get('/requests',[UserController::class,'TechnicianRequests'])->name('users.requests')->middleware('isLoggedIn');
Route::put('/activate/{id}',[UserController::class,'Activate'])->name('users.activate')->middleware('isLoggedIn');

Route::get('email-test', function(){
    $details['email'] = 'cbbmobi2023@gmail.com';
    $data =[
        "full_name" => "raghad" ,
        "email" =>"raghad@gmail.com" ,
        "mobile" => "0551397990",
    ];
    dispatch(new App\Jobs\SendEmailRegisterJob($details,$data));
    dd('done');
    });