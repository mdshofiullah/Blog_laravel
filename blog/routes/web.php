<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BiztroxController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;

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

//--------------------------------------------Front Panel Routes Start--------------------------------------------
Route::get('/', [BiztroxController::class, 'index'])->name('home');
Route::get('/blog-category/{id}', [BiztroxController::class, 'category'])->name('blog-category');
Route::get('/blog-detail/{id}', [BiztroxController::class, 'detail'])->name('blog-detail');
Route::get('/blog-contact', [BiztroxController::class, 'contact'])->name('blog-contact');

//comment
Route::post('/new-comment/{id}', [BiztroxController::class, 'newComment'])->name('new-comment');

//user login for comment
Route::get('/user-login/{id?}', [AuthController::class, 'index'])->name('user-login');
Route::get('/user-register', [AuthController::class, 'register'])->name('user-register');
//user signup for comment
Route::post('/new-user-register', [AuthController::class, 'newRegister'])->name('new-user-register');


//--------------------------------------------Front Panel Routes Ends--------------------------------------------

//--------------------------------------------Admin Panel Routes Start--------------------------------------------
Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

//    Category Module Routes
    Route::get('/add-category', [CategoryController::class, 'index'])->name('category.add');
    Route::post('/new-category', [CategoryController::class, 'create'])->name('category.new');
    Route::get('/manage-category', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/delete-category/{id}', [CategoryController::class, 'delete'])->name('category.delete');

//    Blog Module Route
    Route::get('/add-blog', [BlogController::class, 'index'])->name('blog.add');
    Route::post('/new-blog', [BlogController::class, 'create'])->name('blog.new');
    Route::get('/manage-blog', [BlogController::class, 'manage'])->name('blog.manage');
    Route::get('/detail-blog-info/{id}', [BlogController::class, 'detail'])->name('blog.detail');
    Route::get('/edit-blog/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::get('/update-blog-status/{id}', [BlogController::class, 'updateStatus'])->name('blog.status');
    Route::post('/update-blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/delete-blog/{id}', [BlogController::class, 'delete'])->name('blog.delete');

});


//--------------------------------------------Admin Panel Routes Ends--------------------------------------------

//--------------------------------------------User Panel Routes Starts--------------------------------------------

//--------------------------------------------User Panel Routes Ends--------------------------------------------


