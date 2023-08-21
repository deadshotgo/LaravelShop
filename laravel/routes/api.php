<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ColorController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/test', function () {
    return 'Welcome';
});

Route::resources([
    'categories' => CategoryController::class,
    'sub-categories' => SubCategoryController::class,
    'blogs' => BlogController::class,
    'comments' => CommentController::class,
    'colors' => ColorController::class,
    'brands' => BrandController::class,
    'tags' => TagController::class,
]);
