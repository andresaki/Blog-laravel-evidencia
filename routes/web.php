<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::resource('Admin/blogs',BlogController::class);
Route::resource('Admin/categorias',CategoriaController::class);

Route::get('/categorias', [CategoriaController::class,'verAllCategoria'])->name('categoria.allCategorias');
Route::get('/categoria-Blogs/{category}', [BlogController::class,'blogsPorCategoria'])->name('blog.categoria') ;



Route::get('/blog/{id}', [BlogController::class,'verBlog'])->name('blog.verBlog') ;


Route::get('/home', [HomeController::class, 'index'])->name('home');
