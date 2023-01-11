<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\front_end\IndexController;
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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::prefix('user')->group(function(){
    // Route::middleware(['guest'])->name('user.')->group(function(){
        // Route::view('/login', 'dashboard.user.login')->name('login');
        // Route::view('/register', 'dashboard.user.register')->name('register');
    // });
    // Route::middleware(['auth'])->group(function(){
        // Route::view('/home', 'dashboard.user.home')->name('home');
    // });
// });







/////****Admin All Routes ******/

Route::controller(AdminController::class)->middleware(['guest:admin'])->group(function(){
    Route::get('/admin/login','LoginView')->name('admin.create');
    Route::post('/admin/authentication', 'Login')->name('admin.login');

});
Route::get('/admin/dashboard',[AdminController::class,'AdminHome'])->middleware(['auth:admin'])->name('admin.dashboard');
Route::post('/admin/logout',[AdminController::class,'Logout'])->middleware(['auth:admin'])->name('admin.logout');

Route::controller(AdminProfileController::class)->group(function(){
    Route::get('/admin/profile','AdminProfile')->name('admin.profile');
    Route::get('/admin/profile/edit','AdminProfileEdit')->name('admin.profile.edit');
    Route::post('/admin/profile/store','AdminProfileStore')->name('admin.profile.store');
    Route::get('/admin/change/password','AdminChangePassword')->name('admin.change.password');
    Route::post('/admin/update/change/password','UpdateChangePassword')->name('update.change.password');
});


//**********User All Routes *******/

Route::controller(UserController::class)->middleware(['guest:web'])->group(function(){
    Route::get('/user/register','create')->name('user.register');
    Route::post('/user/store', 'store')->name('user.store');
    Route::get('/user/login','LoginView')->name('user.create');
    Route::post('/authentication', 'Login')->name('user.login');

});
Route::get('/user/dashboard',[UserController::class,'UserHome'])->middleware(['auth:web'])->name('user.dashboard');
Route::post('/user/logout',[UserController::class,'Logout'])->middleware(['auth:web'])->name('user.logout');


Route::controller(IndexController::class)->group(function(){
    Route::get('/','Index');
    Route::get('/user/profile','UserProfile')->name('user.profile');
    Route::post('/user/profile/store', 'UserProfileStore')->name('user.profile.store');
    Route::get('/user/change/password', 'UserChangePassword')->name('change.password');
    Route::post('/user/password/update', 'UserPasswordUpdate')->name('user.password.update');
});
