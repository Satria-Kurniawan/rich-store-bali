<?php

use App\Http\Controllers\BookkeepingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    // Categories
    Route::get('/admin/category-list', [CategoryController::class, 'getCategories'])->name('categoryList');
    Route::get('/admin/category-add', function () {
        return view('admin.categories.category-add');
    });
    Route::post('/admin/category-add', [CategoryController::class, 'addCategory'])->name('categoryAdd');
    Route::get('/admin/category-edit/{id}', [CategoryController::class, 'editCategory'])->name('categoryEdit');
    Route::post('/admin/category-upd/{id}', [CategoryController::class, 'updCategory'])->name('categoryUpd');
    Route::get('/admin/category-del/{id}', [CategoryController::class, 'delCategory'])->name('categoryDel');
    // Products
    Route::get('/admin/product-list', [ProductController::class, 'getProducts'])->name('productList');
    Route::get('/admin/product-create', [ProductController::class, 'displayCategories'])->name('displayCategories');
    Route::post('/admin/product-add', [ProductController::class, 'addProduct'])->name('productAdd');
    Route::get('/admin/product-edit/{id}', [ProductController::class, 'editProduct'])->name('productEdit');
    Route::post('/admin/product-upd/{id}', [ProductController::class, 'updProduct'])->name('productUpd');
    Route::get('/admin/product-del/{id}', [ProductController::class, 'delProduct'])->name('productDel');
    // Bookkeeping
    Route::get('/admin/product-bookkeeping', [BookkeepingController::class, 'getBookkeeping'])->name('getBookkeeping');
    // Cart
    Route::post('/admin/product-add-to-cart/product-{productId}', [CartController::class, 'addProductToCart'])->name('addProductToCart');
    Route::post('/admin/product-cart/item-reduction-{cartContentId}', [CartController::class, 'itemReduction'])->name('itemReduction');
    Route::post('/admin/product-cart/item-addition-{cartContentId}', [CartController::class, 'itemAddition'])->name('itemAddition');
    // Transaction
    Route::post('/admin/record-transaction', [TransactionController::class, 'generateTransaction'])->name('generateTransaction');
    Route::get('/admin/transaction-list', [TransactionController::class, 'getTransactions'])->name('getTransactions');
});

require __DIR__ . '/auth.php';
