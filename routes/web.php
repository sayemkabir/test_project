<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\RegisterController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/',[LoginController::class,'loginPage'])->name('login.page');
Route::post('login',[LoginController::class,'loginValidate'])->name('login.validate');

Route::get('/registration',[RegisterController::class,'registrationPage'])->name('reg.page');
Route::post('/reg/admin',[RegisterController::class,'doRegistration'])->name('registration');

Route::group(['middleware'=>'auth'],function (){

Route::get('/logout',[LoginController::class,'adminLogout'])->name('admin.logout');

Route::get('/dashboard/view',[DashboardController::class,'newDashboard'])->name('dashboard.view');

Route::get('/product/create',[ProductController::class,'newProduct'])->name('product.create.view');

Route::post('/product/create/new',[ProductController::class,'productCreate'])->name('product.create');

Route::get('/product/delete/{id}',[ProductController::class,'productDelete'])->name('product.delete');

Route::get('/product/edit/{id}',[ProductController::class,'productEdit'])->name('product.edit');

Route::put('/product/update/{id}',[ProductController::class,'productUpdate'])->name('product.update');

Route::get('/product/view',[ProductController::class,'productList'])->name('product.list');

});
