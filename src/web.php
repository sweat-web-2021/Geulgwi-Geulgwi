<?php
    use App\Route;

    Route::get("/", "ViewController@main");
    Route::get("/login", "ViewController@login");
    Route::get("/register", "ViewController@register");

    Route::post('/login', 'ActionController@login');
    Route::get("/logout", "ActionController@logout");
    Route::post('/register', 'ActionController@register');

    Route::start();