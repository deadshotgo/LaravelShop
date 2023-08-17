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
    return 'Welcome';
});

Route::resources([
    'category' => CategoryController::class,
    'sub-category' => SubCategoryController::class,
]);

Route::post('/create-blog', [\App\Http\Controllers\AppBlogController::class, 'create_blog']);
Route::get('/blogs', [\App\Http\Controllers\AppBlogController::class, 'all_blogs']);
Route::get('/blog/{id}', [\App\Http\Controllers\AppBlogController::class, 'one_blog']);
Route::put('/blog/{id}', [\App\Http\Controllers\AppBlogController::class, 'update_blog']);
Route::delete('/blog/{id}', [\App\Http\Controllers\AppBlogController::class, 'delete_blog']);

Route::get('/tags', [\App\Http\Controllers\TagsController::class, 'all_tags']);

Route::post('/create-comment', [\App\Http\Controllers\CommentsController::class, 'create_comment']);
Route::get('/comments', [\App\Http\Controllers\CommentsController::class, 'all_comments']);
Route::get('/comment/{id}', [\App\Http\Controllers\CommentsController::class, 'one_comment']);
Route::put('/comment/{id}', [\App\Http\Controllers\CommentsController::class, 'update_comment']);
Route::delete('/comment/{id}', [\App\Http\Controllers\CommentsController::class, 'delete_comment']);
