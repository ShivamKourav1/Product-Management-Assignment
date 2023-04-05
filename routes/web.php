<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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
Route:: group(['middleware'=>'user_auth'],
function(){

    Route::get('/products',[Controller::class,'products']);
    Route::post('/cart_add',[Controller::class,'cart_add']);
    Route::post('/cart_remove',[Controller::class,'cart_remove']);
    
    Route::get('/admin_dashboard', function () {
        return view('admin_dashboard');
    });
    Route::get('/admin_products',[Controller::class,'admin_products']);
    Route::get('/product_new',function () {  return view('product_new');});
    Route::post('/product_add',[Controller::class,'product_add']);
    Route::get('/product_edit',[Controller::class,'product_edit']);
    Route::post('/product_update',[Controller::class,'product_update']);
});
Route:: any('/login',function () {
    return view('login');
});
Route:: any('/logout',[Controller::class, 'logout']);
Route:: any('/validatelogin',[Controller::class, 'validatelogin']);