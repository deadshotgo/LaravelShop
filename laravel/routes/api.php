<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\CategoryController;
use \App\Http\Controllers\Api\SubCategoryController;

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
    return '[privet][svelolool]';
});

Route::resources([
    'category' => CategoryController::class,
    'sub-category' => SubCategoryController::class,
]);

Route::get('/blogs', [\App\Http\Controllers\AppBlogController::class, 'all_blogs']);
Route::get('/blog/{id}', [\App\Http\Controllers\AppBlogController::class, 'one_blog']);
Route::put('/blog/{id}', [\App\Http\Controllers\AppBlogController::class, 'update_blog']);
Route::delete('/blog/{id}', [\App\Http\Controllers\AppBlogController::class, 'delete_blog']);
