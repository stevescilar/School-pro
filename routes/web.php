<?php

use Illuminate\Support\Facades\Route; 
// very key
use App\http\Controllers\ContactController; 


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function (){
    echo "Your are not here";
});
Route::get('/about', function (){
    return view('about');
})->middleware('check');

// this was used in laravel 7
// Route::get('/about',function (){
//     return view('about');
// });

// laravel 8 -> format
Route::get('/contact',[ContactController::class, 'index']);