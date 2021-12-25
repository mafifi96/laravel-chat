<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Route::get("/login", [LoginController::class, 'show'])->name("login");

Route::get("/register", [RegisterController::class, 'show'])->name("register");

Route::post("/log", [LoginController::class, 'authenticate']);

Route::post("/reg", [RegisterController::class, 'store']);


Route::middleware(['auth'])->group(function () {

    Route::get('/profile/{id}/{name}', [UserController::class, 'profile']);

    Route::get('/messenger/{id}/{name}', [UserController::class, 'messenger']);

    Route::post("/send", [MessageController::class, 'send']);

    Route::post("/ajax-messages", [MessageController::class, 'messages']);

    Route::post("/logout", function () {

        $user = Auth::user();
        $user->status = "offline";

        if($user->save()){ Auth::logout(); return redirect("/login");}
    
    });
    


});
