<?php
    use App\Route;

    Route::get("/", "ViewController@main");
    Route::get("/list", "ViewController@list");
    Route::get("/view", "ViewController@view");
    Route::get("/edit", "ViewConttoller@edit");
    Route::get("/login", "ViewController@login");
    Route::get("/write", "ViewController@write");
    Route::get("/mypage", "ViewController@mypage");
    Route::get("/register", "ViewController@register");

    Route::post("/save", "ActionController@save");
    Route::post('/login', 'ActionController@login');
    Route::get("/logout", "ActionController@logout");
    Route::post('/review', "ActionController@review");
    Route::post("/unsave", "ActionController@unsave");
    Route::post('/unlike', 'ActionController@unlike');
    Route::post("/editok", "ActionController@editok");
    Route::post('/writeok', 'ActionController@writeok');
    Route::post('/chklike', 'ActionController@chklike');
    Route::post('/register', 'ActionController@register');

    Route::start();