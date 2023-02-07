<?php

use App\Http\Controllers\Admin\Main\AdminMainIndexController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Post\PostController;
use App\Http\Controllers\Admin\Tag\TagController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Main\MainIndexController;
use App\Http\Controllers\Personal\Comment\CommentIndexController;
use App\Http\Controllers\Personal\Liked\LikedDeleteController;
use App\Http\Controllers\Personal\Liked\LikedIndexController;
use App\Http\Controllers\Personal\Main\PersonalIndexController;
use App\Http\Controllers\Post\PostIndexController;
use App\Http\Controllers\Post\StoreCommentController;
use App\Http\Controllers\Post\StoreLikeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', MainIndexController::class)->name('main.index');

Route::controller(PostIndexController::class)->group(function () {
    Route::get('/blog', 'index')->name('post.index');
    Route::get('/blog/{post}', 'show')->name('post.show');
});

Route::prefix('{post}/comment')->post('/', StoreCommentController::class)->name('post.comment.store');

Route::prefix('{post}/likes')->post('/', StoreLikeController::class)->name('post.like.store');


Route::prefix('personal')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', PersonalIndexController::class)->name('personal.main.index');
    Route::prefix('likeds')->group(function () {
        Route::get('/', LikedIndexController::class)->name('personal.liked.index');
        Route::delete('/{post}', LikedDeleteController::class)->name('personal.liked.delete');
    });
    Route::controller(CommentIndexController::class)->prefix('comments')->group(function () {
        Route::get('/', 'index')->name('personal.comment.index');
        Route::get('/{comment}/edit', 'edit')->name('personal.comment.edit');
        Route::post('/{comment}', 'update')->name('personal.comment.update');
        Route::delete('/{comment}', 'delete')->name('personal.comment.delete');
    });
});


Route::prefix('admin')->middleware(['auth', 'admin', 'verified'])->group(function () {
    Route::get('/', AdminMainIndexController::class)->name('admin.main.index');

    Route::controller(UserController::class)->prefix('users')->group(function () {
        Route::get('/', 'index')->name('admin.user.index');
        Route::get('create', 'create')->name('admin.user.create');
        Route::POST('create', 'store')->name('admin.user.store');
        Route::get('/{user}', 'show')->name('admin.user.show');
        Route::get('/{user}/edit', 'edit')->name('admin.user.edit');
        Route::POST('/{user}/edit', 'update')->name('admin.user.update');
        Route::delete('/{user}', 'delete')->name('admin.user.delete');
    });

    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('/', 'index')->name('admin.category.index');
        Route::get('create', 'create')->name('admin.category.create');
        Route::POST('create', 'store')->name('admin.category.store');
        Route::get('/{category}', 'show')->name('admin.category.show');
        Route::get('/{category}/edit', 'edit')->name('admin.category.edit');
        Route::POST('/{category}/edit', 'update')->name('admin.category.update');
        Route::delete('/{category}', 'delete')->name('admin.category.delete');
    });

    Route::controller(TagController::class)->prefix('tags')->group(function () {
        Route::get('/', 'index')->name('admin.tag.index');
        Route::get('create', 'create')->name('admin.tag.create');
        Route::POST('create', 'store')->name('admin.tag.store');
        Route::get('/{tag}', 'show')->name('admin.tag.show');
        Route::get('/{tag}/edit', 'edit')->name('admin.tag.edit');
        Route::POST('/{tag}/edit', 'update')->name('admin.tag.update');
        Route::delete('/{tag}', 'delete')->name('admin.tag.delete');
    });

    Route::controller(PostController::class)->prefix('posts')->group(function () {
        Route::get('/', 'index')->name('admin.post.index');
        Route::get('create', 'create')->name('admin.post.create');
        Route::POST('create', 'store')->name('admin.post.store');
        Route::get('/{post}', 'show')->name('admin.post.show');
        Route::get('/{post}/edit', 'edit')->name('admin.post.edit');
        Route::POST('/{post}/edit', 'update')->name('admin.post.update');
        Route::delete('/{post}', 'delete')->name('admin.post.delete');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['verify' => true]);
