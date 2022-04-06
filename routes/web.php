<?php

use App\Http\Controllers\Auth\User\LoginController;
use App\Http\Controllers\Main\FaqController;
use App\Http\Controllers\Main\ProductController;
use App\Http\Controllers\Main\SpeakerController;
use App\Http\Controllers\Main\SuggestionController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\ProfileController;
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
        Route::get('/show/{product}/join/',[ProductController::class,'join'])->name('join');
    });
    Route::group(['prefix'=>'speaker','as' => 'speaker::'],function (){
        Route::get('/',[SpeakerController::class,'index'])->name('index');
//        Route::get('/show/{speaker}',[ProductController::class,'show'])->name('show');
    });
    Route::get('/faq',[FaqController::class,'index'])->name('faq');
    Route::group(['prefix'=>'contact','as' => 'suggestion::'],function (){
        Route::get('/',[SuggestionController::class,'index'])->name('index');
        Route::post('/',[SuggestionController::class,'store'])->name('store');
    });

    Route::get('/login',[LoginController::class,'index'])->name('login');
    Route::post('/login',[LoginController::class,'login'])->name('postLogin');
    Route::get('/register',[LoginController::class,'register'])->name('register');
    Route::post('/register',[LoginController::class,'store'])->name('postRegister');
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});

Route::group(['middleware' => 'user','prefix' => 'user','as' => 'user::'],function (){
    Route::get('/dashboard', [DashboardController::class,'index'])->name('index');
    Route::group(['prefix' => 'profile','as' => 'profile::'],function (){
        Route::get('/', [ProfileController::class,'index'])->name('index');
        Route::put('/', [ProfileController::class,'update'])->name('update');
    });

    Route::group(['prefix' => 'events','as' => 'product::'],function (){
        Route::get('/', [UserProductController::class,'index'])->name('index');
        Route::post('/', [UserProductController::class,'store'])->name('store');
        Route::put('/{product}', [UserProductController::class,'update'])->name('update');
        Route::get('/my-events', [UserProductController::class,'myEvents'])->name('myEvents');
        Route::get('/{product}/audience', [UserProductController::class,'audience'])->name('audience');
        Route::get('/{product}/audience/excel', [UserProductController::class,'generateExcel'])->name('excel');
        Route::get('/{product}/audience/{user}/certificates', [UserProductController::class,'generateCertificates'])->name('certificates');

    });
});
