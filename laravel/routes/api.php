<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SubCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BlogController;
use \App\Http\Controllers\Api\CommentController;
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
    'category' => CategoryController::class,
    'sub-category' => SubCategoryController::class,
    'blogs' => BlogController::class,
    'comments' => CommentController::class,
]);
