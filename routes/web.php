<?php

namespace App\Http\Controllers;

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
});

Route::middleware('userLogged')->group(function(){

    //Dashbord
    Route::get('/dashbord',[HomeController::class,'home'])->name('home');

    

        //Roles
        Route::get('/roles',[RoleController::class,'index'])->name('roles');
        Route::match(['GET','POST'],'/add-role',[RoleController::class,'add'])->name('role.add');
        Route::match(['GET','POST'],'/edit-role{role_id}',[RoleController::class,'edit'])->name('role.edit');
        Route::match(['GET','POST'],'role-delete{role_id}',[RoleController::class,'delete'])->name('role.delete');

        //users
        Route::get('/users',[UserController::class,'index'])->name('users');
        Route::match(['GET','POST'],'/add',[UserController::class,'add'])->name('user.add');
        Route::match(['GET','POST'],'/edit{user_id}',[UserController::class,'edit'])->name('user.edit');
    

    
        Route::match(['GET','POST'],'/add-ticket',[TicketController::class,'addTicket'])->name('ticket.add');
        Route::get('/tickets',[TicketController::class,'index'])->name('tickets');
    
    

    Route::get('/logout',function(){
        auth()->logout();
        return redirect()->route('login');
    })->name('logout');
});

//login
Route::match(['GET','POST'],'/login',[HomeController::class,'login'])->name('login');
