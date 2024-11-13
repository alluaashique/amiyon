<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//middleware
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\IsUserMiddleware;

use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;


use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BlogController;


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

Route::get('/', [UserController::class, 'index'])->name('index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('admin.dashboard');

// Admin Routes
Route::middleware(['auth', IsAdminMiddleware::class])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('index');

    
    
    Route::get('/blogs', [AdminBlogController::class, 'index'])->name('blog.index');
    Route::get('/blogs/create', [AdminBlogController::class, 'create'])->name('blog.create');
    Route::post('/blogs', [AdminBlogController::class, 'store'])->name('blog.store');
    Route::get('/blogs/{blog}', [AdminBlogController::class, 'show'])->name('blog.show');
    Route::get('/blogs/{blog}/edit', [AdminBlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blogs/{blog}', [AdminBlogController::class, 'update'])->name('blog.update');
    Route::delete('/blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('blog.destroy');

    

    
});



// User Routes

Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blog.show');
Route::middleware(['auth', IsUserMiddleware::class])->group(function () {

    
    Route::post('/blogs/comment/create/{id}', [BlogController::class, 'store_comment'])->name('blog.comment.store');
    Route::post('/blogs/comment/reply', [BlogController::class, 'reply_comment'])->name('blog.comment.reply');


    // Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('index');

    
    
    // Route::get('/blogs', [BlogController::class, 'index'])->name('blog.index');
    // Route::get('/blogs/create', [BlogController::class, 'create'])->name('blog.create');
    // Route::post('/blogs', [BlogController::class, 'store'])->name('blog.store');
    // Route::get('/blogs/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    // Route::put('/blogs/{blog}', [BlogController::class, 'update'])->name('blog.update');
    // Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');

    

    
});



require __DIR__.'/auth.php';
