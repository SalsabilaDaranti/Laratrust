<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route Tester Admin Template

Route::get('tes-admin',function () {
    return view('layouts.admin');
});
    //Admin Route
    Route::group(['prefix'=>'admin','middleware'=>['auth']],
function () {
 Route::get('/',function (){
     return view('admin.index');
 });

 Route::resource('author', AuthorController::class);
 Route::resource('books', BookController::class);


});

