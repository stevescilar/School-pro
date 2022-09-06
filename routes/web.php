<?php

use Illuminate\Support\Facades\Route; 
// very key
use App\http\Controllers\ContactController; 
use App\http\Controllers\CategoryController; 
use App\http\Controllers\BrandController;

use App\Models\User;
use Illuminate\Support\Facades\DB;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function (){
    echo "Your are not here";
});
Route::get('/about', function (){
    return view('about');
})->middleware('age');

// this was used in laravel 7
// Route::get('/about',function (){
//     return view('about');
// });

// laravel 8 -> format
Route::get('/contact-asdf-asdfasd',[ContactController::class, 'index'])->name('con');

// category Controller Route,
Route::get('/category/all',[CategoryController::class, 'AllCat'])->name('all.category');
// Add Category
Route::post('/category/add',[CategoryController::class, 'AddCat'])->name('store.category');
// Edit Category
Route::get('/category/edit/{id}',[CategoryController::class, 'Edit']);
Route::post('/category/update/{id}',[CategoryController::class, 'Update']);
Route::get('/softdelete/category/{id}',[CategoryController::class, 'SoftDelete']);

Route::get('category/restore/{id}',[CategoryController::class, 'Restore']);
Route::get('pdelete/category/{id}',[CategoryController::class, 'Pdelete']);

// Brand Route
Route::get('/brand/all',[BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add',[BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}',[BrandController::class, 'Edit']);
Route::post('/brand/update/{id}',[BrandController::class, 'Update']);
Route::get('/brand/delete/{id}',[BrandController::class, 'Delete']);

// multi-images Route
Route::get('/multi/image',[BrandController::class, 'MultiPic'])->name('multi.image');
Route::post('/multi/image',[BrandController::class, 'StoreImage'])->name('store.image');






Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        // getting data from database

        //$users = User::all();
        $users = DB::table('users')->get(); //using query builder 
        return view('dashboard',compact('users'));
    })->name('dashboard');
});
