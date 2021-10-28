<?php
    use App\Route;

    Route::get("/", "ViewController@main");
    Route::get("/list", "ViewController@list");
    Route::get("/view", "ViewController@view");
    Route::get("/login", "ViewController@login");
    Route::get("/write", "ViewController@write");
    Route::get("/mypage", "ViewController@mypage");
    Route::get("/register", "ViewController@register");

    Route::post('/login', 'ActionController@login');
    Route::get("/logout", "ActionController@logout");
    Route::post('/writeok', 'ActionController@writeok');
    Route::post('/chklike', 'ActionController@chklike');
    Route::post('/register', 'ActionController@register');

    Route::start();