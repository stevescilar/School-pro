<?php

use Illuminate\Support\Facades\Route; 
// very key
use App\http\Controllers\ContactController; 


Route::get('/', function () {
    return view('welcome');
});
// this was used in laravel 7
// Route::get('/about',function (){
//     return view('about');
// });

// laravel 8 -> format
Route::get('/about',[ContactController::class, 'index']);