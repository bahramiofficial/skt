<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\Panel\CommentController;
use App\Http\Controllers\Panel\PostController;
use App\Http\Controllers\Panel\EditorUploadController;
use App\Http\Controllers\Panel\Shop\CategoryshopController;

Route::middleware(['auth', 'admin'])->prefix('/panel')->group(function() {
    Route::resource('/users', UserController::class)->except(['show']);
    Route::resource('/categories', CategoryController::class)->except(['show', 'create']);
    Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');



});

Route::middleware(['auth', 'author'])->prefix('/panel')->group(function() {
    Route::resource('/posts', PostController::class)->except(['show']);
    Route::post('/editor/upload', [EditorUploadController::class, 'upload'])->name('editor-upload');
});

