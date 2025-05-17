<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


route::get('/login', function(){
    return view('auth.login');
})->name('login');
route::get('/register', function(){
    return view('auth.register');
});

Route::get('/dashboard', function() {
    return view('index');
})->name('dashboard')->middleware('auth');

route::post('/register', [AdminController::class,'register'])->name('register');
route::post('/login',[AdminController::class,'login'])->name('admin.login');
route::post('/logout', [AdminController::class,'logout'])->name('admin.logout');