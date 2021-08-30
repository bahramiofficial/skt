<?php

use App\Http\Controllers\Panel\Admin\Shop\AttributegroupController;
use App\Http\Controllers\Panel\Admin\Shop\ProductController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Panel\Admin\Shop\CategoryshopController;

Route::middleware(['auth', 'admin'])->prefix('/panel/admin')->name('admin.')->group(function() {

    Route::resource('/categoryshop', CategoryshopController::class)->except(['show']);

    Route::resource('/product', ProductController::class);

    Route::resource('/attributegroup', AttributegroupController::class)->except(['show']);

    // Route::get('/trackIamge/{id}', [TrackController::class, 'uplodImageTrack'])->name('uplodImageTrack');


});

