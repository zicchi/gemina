<?php

use App\Http\Controllers\Main\FaqController;
use App\Http\Controllers\Main\ProductController;
use App\Http\Controllers\Main\SuggestionController;
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

Route::group(['prefix' => '/','as' => 'main::'],function (){
    Route::get('/', function () {
        return view('pages.main.home');
    })->name('home');
    Route::group(['prefix'=>'product','as' => 'product::'],function (){
        Route::get('/',[ProductController::class,'index'])->name('index');
        Route::get('/show/{product}',[ProductController::class,'show'])->name('show');
    });
    Route::get('/faq',[FaqController::class,'index'])->name('faq');
    Route::group(['prefix'=>'contact','as' => 'suggestion::'],function (){
        Route::get('/',[SuggestionController::class,'index'])->name('index');
        Route::post('/',[SuggestionController::class,'store'])->name('store');
    });
});
