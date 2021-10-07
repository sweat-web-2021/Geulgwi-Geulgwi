<?php
    use App\Route;

    Route::get("/", "ViewController@main");
    Route::get("/login", "ViewController@login");
    Route::get("/register", "ViewController@register");

    Route::get("/logout", "ActionController@logout");
    Route::post('/registerCom', 'ActionController@registerCom');
    Route::post('/loginCom', 'ActionController@loginCom');

    Route::start();