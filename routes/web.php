<?php

use App\Http\Livewire\BOM;
use App\Http\Livewire\ProductForm;
use App\Http\Livewire\ProductTree;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/product', ProductForm::class)->name('product');
Route::get('/tree', ProductTree::class)->name('productTree');
Route::get('/bom', BOM::class)->name('productBom');


Route::get('/', function () {
    return view('welcome');
});