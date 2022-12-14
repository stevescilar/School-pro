<?php

use Illuminate\Support\Facades\Route; 
use App\http\Controllers\ContactController; 
use App\http\Controllers\CategoryController; 
use App\http\Controllers\BrandController;
use App\http\Controllers\HomeController;
use App\http\Controllers\AboutController;
use App\http\Controllers\ServiceController;

use App\Models\User;
use App\Models\Multipic;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// Verification Email Routes 
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/dashboard', function () {
    // Only verified users may access this route...
})->middleware('verified');

// End of Email Verification routes 

// home routes
Route::get('/', function () {
    $brands = DB::table('brands')->get(); 
    $abouts = DB::table('home_abouts')->first(); 
    $services = DB::table('services')->get(); 
    $contacts  = DB::table('contacts')->first();
    $images = Multipic::all();

    return view('home',compact('brands','abouts','services','images','contacts'));
});

// Route::get('/home', function (){
//     return view('home');
// });
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

// Admin All Route //slider
Route::get('/home/slider',[HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider',[HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider',[HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/slider/edit/{id}',[HomeController::class, 'Edit']);
Route::post('/slider/update/{id}',[HomeController::class, 'Update']);
Route::get('/slider/delete/{id}',[HomeController::class, 'Delete']);

// About Us section
Route::get('/home/about',[AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/about',[AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/about',[AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/edit/{id}',[AboutController::class, 'Edit']);
Route::post('/about/update/{id}',[AboutController::class, 'Update']);
Route::get('/about/delete/{id}',[AboutController::class, 'Delete']);


// services routes
Route::get('/home/services',[ServiceController::class, 'HomeService'])->name('home.service');
Route::post('/add/services',[ServiceController::class, 'AddService'])->name('add.service');
Route::get('/service/edit/{id}',[ServiceController::class, 'Edit']);
Route::post('/service/update/{id}',[ServiceController::class, 'Update']);
Route::get('/service/delete/{id}',[ServiceController::class, 'Delete']);

// portfolio page
Route::get('/portfolio',[AboutController::class, 'Portfolio'])->name('portfolio');

// admin contact page route
Route::get('/admin/contact',[ContactController::class, 'AdminContact'])->name('admin.contact');
Route::get('/add/contact',[ContactController::class, 'AddContact'])->name('add.contact');
Route::post('/store/contact',[ContactController::class, 'StoreContact'])->name('store.contact');
Route::get('/contact/edit/{id}',[ContactController::class, 'Edit']);
Route::get('/admin/message',[ContactController::class, 'AdminMessage'])->name('add.message');

Route::post('/contact/update/{id}',[ContactController::class, 'Update']);


// user Contacts route
Route::get('/contact',function (){
    $services = DB::table('services')->get(); 
    $contacts  = DB::table('contacts')->first();
    
    return view('contact',compact('services','contacts'));
});
Route::get('/contact/delete/{id}',[ContactController::class, 'Delete']);

// user contact form 
Route::get('/contact',[ContactController::class, 'ContactMe'])->name('contact');
Route::post('/contact/form',[ContactController::class, 'ContactForm'])->name('contact.form');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

        // getting data from database

        //$users = User::all();
        // $users = DB::table('users')->get(); //using query builder 
        return view('admin.index');
    })->name('dashboard');
});

// logout Route
Route::get('/user/logout',[BrandController::class, 'Logout'])->name('user.logout');



// Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
