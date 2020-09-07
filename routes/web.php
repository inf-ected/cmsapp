<?php

use App\static_page;
use Illuminate\Support\Facades\Route;

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
})->name('home');


Route::resource('/admin/tag','TagController');
Route::resource('/admin/stpage','StaticPageController');
// Route::get('/admin/stpage','StaticPageController@index');

// ->name('StaticPageController@create','stpage.create')
// ->name('StaticPageController@store','stpage.store');
Route::resource('/admin/videopage','VideoPageController');




Route::get('/{url}',function($url){
return static_page::where('url','/'.$url)->first()->content;
});