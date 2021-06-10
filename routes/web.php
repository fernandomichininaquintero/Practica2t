<?php

use App\Http\Controllers\Productos;
use App\Http\Controllers\Users;
use App\Http\Controllers\Carrito;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [Productos::class, 'index'])->name('home');

Route::get('/categoria/{categoria_id}', [Productos::class, 'showProductosCategoria'])->name('categoria.ver');

Route::any('/producto/{producto_id}', [Productos::class, 'showProducto'])->name('producto.ver');

Auth::routes();

Route::get('/carrito', [Carrito::class, 'index'])->name('carrito_ver');

Route::post('/carrito-add', [Carrito::class, 'store'])->name('carrito_add');
Route::post('/carrito-destroy', [Carrito::class, 'destroy'])->name('carrito_destroy');
Route::post('/carrito-clear', [Carrito::class, 'clear'])->name('carrito_clear');

Route::get('/modificar-usuario', [Users::class, 'editView'])->name('user.modify')->middleware('auth');
Route::post('/modificar-usuario', [Users::class, 'edit'])->name('user.modify')->middleware('auth');

Route::any('/eliminar-usuario', [Users::class, 'destroy'])->name('user.delete')->middleware('auth');