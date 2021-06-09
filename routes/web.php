<?php

use App\Http\Controllers\Productos;
use App\Http\Controllers\Users;
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

Route::get('/categoria/{categoria_id}', [Productos::class, 'showProductosCategoria'])->name('categoria.ver')->middleware('auth');

Route::get('/producto/{producto_id}', [Productos::class, 'showProducto'])->name('producto.ver')->middleware('auth');

Auth::routes();

Route::get('/carrito', [])->name('carrito')->middleware('auth');

Route::any('/modificar-usuario', [Users::class, 'edit'])->name('user.modify')->middleware('auth');

Route::any('/eliminar-usuario', [Users::class, 'destroy'])->name('user.delete')->middleware('auth');