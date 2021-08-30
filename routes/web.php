<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ShowPostController;
use App\Http\Controllers\SearchPostController;
use App\Http\Controllers\ShowPostCategoryController;
use App\Http\Controllers\LikePostController;
use App\Http\Controllers\CommentController as StoreCommentController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\Panel\ProfileController;


Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/post/{post:slug}', [ShowPostController::class, 'show'])->name('post.show');
Route::get('/search', [SearchPostController::class, 'show'])->name('post.search');
Route::get('/category/{category:slug}', [ShowPostCategoryController::class, 'show'])->name('category.show');
Route::middleware(['auth'])->post('/comment', [StoreCommentController::class, 'store'])->name('comment.store');
Route::middleware(['auth', 'throttle:like'])->post('/like/{post:slug}', [LikePostController::class, 'store'])->name('like.post');

Route::middleware('auth')->get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::middleware('auth')->put('/profile', [ProfileController::class, 'update'])->name('profile.update');


//auth route
require __DIR__.'/web/auth.php';

//track route
require __DIR__.'/web/track.php';

//panel route
require __DIR__.'/web/panel.php';

//track route
require __DIR__.'/web/shop.php';






































///////////////////////////

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use App\Models\Province;
use App\Models\City;



Route::get('/test', function () {

    $insertedSlugs = [];
    $provinces = json_decode(file_get_contents(realpath(__DIR__.'/../storage/cities.json')), true);
    foreach ($provinces as $province) {
        $tempModel = Province::create(['id' => $province['id'], 'name' => trim($province['name'])]);
        City::insert(array_map(function ($city) use ($tempModel, &$insertedSlugs) {
            $slug = trim($city);

            $insertedSlugs[] = $slug;

            return ['province_id' => $tempModel->id, 'name' => trim($city), 'slug' => $slug];
        }, $province['cities']));
    }




});


