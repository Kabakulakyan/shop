<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Middleware\EnsureTokenIsValid;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
post
*/

Route::get('market', function () {
   return view('market');
});
Route::middleware([EnsureTokenIsValid::class])->group(function () {
   Route::get('/example', [TestController::class, 'example'])->middleware('userLoggedIn');
  
Route::get('/categories', [CategoryController::class, 'showCategories'])->name('categories');
Route::post('/categories', [CategoryController::class, 'addCategories'])->name('addCategories');
Route::get('/page_from_categories', [CategoryController::class, 'showCategorie'])->name('page_from_categories');
Route::get('/products', [ProductController::class, 'showProducts'])->name('products');
Route::get('/deleate_cat/{cat}',[CategoryController::class, 'deleate']);
Route::post('/add-product', [ProductController::class, 'addProducts'])->name('addProducts');
Route::get('logout', [TestController::class, 'logout'])->name('logout');
Route::get('/edit/{id}', [TestController::class, 'edit'])->name('edit');
Route::post('/edit/{id}', [TestController::class, 'editCat'])->name('editCat');
Route::get('/users', [CategoryController::class, 'showUser'])->name('showUser');
Route::get('/add-product', [ProductController::class, 'addProd'])->name('addProd');
Route::get('/add-product', [ProductController::class, 'addProd'])->name('addProd');
Route::get('/', [ProductController::class, 'showCategories_market'])->name('mark');
Route::get('/search', [ProductController::class, 'search'])->name('search');


});
// Route::get('test', '../app/Http/Controllers/TestController@index');
Route::get('/login', [TestController::class, 'login'])->name('Home');
Route::get('/register', [TestController::class, 'register'])->name('register');
Route::post('/register', [TestController::class, 'postRequest'])->name('postRequest');
Route::post('/check-login', [TestController::class, 'login_check'])->name('login_check');
