<?php

use App\Models\category;
use App\Models\property;
use App\Models\propimage;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Crypt;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $categ = category::where('status',1)->get();
    $prop = property::where('status',1)->get();
    return view('welcome',['categ' => $categ , 'prop' => $prop]);
});

Route::get('/search_categ_{id}', function ($id) {
    $categ = category::where('status',1)->get();
    $prop = property::where('category',$id)->where('status',1)->get();
    return view('welcome',['categ' => $categ , 'prop' => $prop]);
})->name('searchcateg');

Route::get('/viewmore_{id}', function ($id) {
    $ids = Crypt::decrypt($id);
    $prop = property::where('id',$ids)->first();
    $propimage = propimage::where('prop_id',$ids)->get();
    $propmore = property::where('category',$prop->category)->get();
    $categ = category::where('status',1)->get();
    return view('viewmore', ['prop' => $prop , 'propimage' => $propimage , 'propmore' => $propmore , 'categ' => $categ]);
})->name('view_more');


Route::get('/contact_us', function () {
    return view('contactus');
});

Route::get('/about_us', function () {
    return view('aboutus');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/categories', [App\Http\Controllers\HomeController::class, 'categories'])->name('categories')->middleware('auth');
Route::get('/add_category', [App\Http\Controllers\HomeController::class, 'add_category'])->name('add_category')->middleware('auth');
Route::post('/post_category', [App\Http\Controllers\HomeController::class, 'post_category'])->name('postcategory')->middleware('auth');
Route::post('/delete_category_{id}', [App\Http\Controllers\HomeController::class, 'delete_category'])->name('deletecateg')->middleware('auth');
Route::post('/edit_category_{id}', [App\Http\Controllers\HomeController::class, 'edit_category'])->name('editcateg')->middleware('auth');


Route::get('/properties', [App\Http\Controllers\HomeController::class, 'properties'])->name('properties')->middleware('auth');
Route::get('/add_property', [App\Http\Controllers\HomeController::class, 'add_property'])->name('add_property')->middleware('auth');
Route::post('/post_property', [App\Http\Controllers\HomeController::class, 'post_property'])->name('postproperty')->middleware('auth');
Route::post('/delete_property/{id}', [App\Http\Controllers\HomeController::class, 'delete_property'])->name('deleteproperty')->middleware('auth');
Route::get('/view_property/{id}', [App\Http\Controllers\HomeController::class, 'view_property'])->name('viewproperty')->middleware('auth');
Route::post('/post_photo/{id}', [App\Http\Controllers\HomeController::class, 'post_photo'])->name('postphoto')->middleware('auth');
Route::post('/photo_delete/{id}', [App\Http\Controllers\HomeController::class, 'delete_photo'])->name('deletephoto')->middleware('auth');
Route::post('/post_edit_property/{id}', [App\Http\Controllers\HomeController::class, 'post_edit_property'])->name('editpostproperty')->middleware('auth');
Route::get('/messages', [App\Http\Controllers\HomeController::class, 'messages'])->name('message')->middleware('auth');
Route::post('/post_message', [App\Http\Controllers\HomeController::class, 'postmessage'])->name('postmessage')->middleware('auth');
