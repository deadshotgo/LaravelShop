<?php

use App\Http\Controllers\Api\BlogController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ColorController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthController;
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
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('token', [AuthController::class, 'token']);
Route::resource('categories', CategoryController::class)->only([
    'index', 'show'
]);
Route::resource('sub-categories', SubCategoryController::class)->only([
    'index', 'show'
]);

Route::resource('blogs', BlogController::class)->only([
    'index', 'show'
]);

Route::resource('comments', CommentController::class)->only([
    'index', 'show'
]);

Route::resource('colors', ColorController::class)->only([
    'index', 'show'
]);

Route::resource('brands', BrandController::class)->only([
    'index', 'show'
]);

Route::resource('tags', TagController::class)->only([
    'index', 'show'
]);

Route::resource('products', ProductController::class)->only([
    'index', 'show'
]);

Route::resource('products', ProductController::class)->only([
    'create', 'store', 'update', 'destroy'
])->middleware(['auth:sanctum', 'ability:admin']);

Route::resource('tags', TagController::class)->only([
    'create', 'store', 'update', 'destroy'
])->middleware(['auth:sanctum', 'ability:admin']);

Route::resource('brands', BrandController::class)->only([
    'create', 'store', 'update', 'destroy'
])->middleware(['auth:sanctum', 'ability:admin']);

Route::resource('colors', ColorController::class)->only([
    'create', 'store', 'update', 'destroy'
])->middleware(['auth:sanctum', 'ability:admin']);

Route::resource('comments', CommentController::class)->only([
    'create', 'store', 'update', 'destroy'
])->middleware(['auth:sanctum', 'ability:admin']);

Route::resource('blogs', BlogController::class)->only([
    'create', 'store', 'update', 'destroy'
])->middleware(['auth:sanctum', 'ability:admin']);

Route::resource('categories', CategoryController::class)->only([
    'create', 'store', 'update', 'destroy'
])->middleware(['auth:sanctum', 'ability:admin']);

