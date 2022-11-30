<?php

use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
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



// Auth::routes();

Route::get('/', function () {
    return view('login')->with(array('success'=>0,'load'=>''));
})->middleware(AuthMiddleware::class);

    Route::get('/login', function () {
        return view('login')->with(array('success'=>0,'load'=>''));
    })->middleware(AuthMiddleware::class);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('register',[RegistrationController::class,'loadRegistrationPage']);
Route::post('submit',[RegistrationController::class,'Register']);
Route::post('login',[RegistrationController::class,'authenticate']);

Route::group(['middleware'=>['web','user_auth']],function(){

    Route::get('home',[RegistrationController::class,'homePage']);
    
});


Route::get('edit',[RegistrationController::class,'edit_page']);

Route::post('profile',[RegistrationController::class,'edit_details']);

Route::get('logout', [RegistrationController::class, 'logOut']);