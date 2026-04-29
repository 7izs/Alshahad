<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\alshahadcontroller;
use App\Http\Controllers\DashboardController;




Route::get('/', [alshahadcontroller::class, 'index'])->name('landpage');
Route::get('/product/{id}', [alshahadcontroller::class, 'show'])->name('products.show');

// Dashboard
Route::get('/dashboard',function(){
    return view('dashboard.index');
        })->name('dashboard');


route::get('/dashboard/product',[DashboardController::class,'get_product'])->name('dashboard.product');
route::get('/dashboard/cars',[DashboardController::class,'get_details'])->name('dashboard.details');

Route::post('/Save/product',[DashboardController::class,'Save_product'])->name('save_product');

Route::post('/save_details',[DashboardController::class,'Save_details'])->name('save_details');

Route::get('/delete_product/{id}',[DashboardController::class,'Delete_product'])->name('delete_product');
Route::get('/delete_details/{id}',[DashboardController::class,'Delete_details'])->name('delete_details');

Route::get('/edit_Product/{id}',[DashboardController::class,'Edit_Product'])->name('edit_product');
Route::post('/update_details/{id}',[DashboardController::class,'Update_details'])->name('update_details');

Route::get('/edit_Details/{id}',[DashboardController::class,'Edit_Details'])->name('edit_Details');
Route::post('/update_product/{id}',[DashboardController::class,'Update_product'])->name('update_product');
