<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Invoices;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::group(['middleware'=>[
        'auth:sanctum',
        'verified'
    ]],function(){
    Route::get('/customers',function(){
        return view('customers.index');
    })->name('customers');

    Route::get('/customers/{id}',function($id){
        return $id;
    })->name('customer.show');

    Route::get('/products',function(){
      return view('products.product');
    })->name('products');

    Route::get('invoices',[invoices::class,'render'])->name('invoices');
});

Route::get('/users', [App\Http\Controllers\UserController::class,'index']);
Route::get('/users/update', [App\Http\Controllers\UserController::class,'updateUser'])->name('user.update.status');