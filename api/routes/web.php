<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/contact');
});

Route::get('contact', function () {
    return view('contact.index');
});
