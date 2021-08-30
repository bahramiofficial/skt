<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Track\TrackController;

Route::get('/track', [TrackController::class, 'index'])
    ->name('track.index');


//-------------admin---------------
Route::middleware(['auth', 'admin'])->prefix('/panel')->group(function () {

    Route::resource('/track', TrackController::class)->except(['show']);
    Route::get('/trackIamge/{id}', [TrackController::class, 'uplodImageTrack'])->name('uplodImageTrack');

});
