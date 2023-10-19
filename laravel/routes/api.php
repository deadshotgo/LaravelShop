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
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('token', [AuthController::class, 'token']);
Route::apiResource('categories', CategoryController::class)->only([
    'index', 'show'
]);
Route::apiResource('sub-categories', SubCategoryController::class)->only([
    'index', 'show'
]);

Route::apiResource('blogs', BlogController::class)->only([
    'index', 'show'
]);

Route::apiResource('comments', CommentController::class)->only([
    'index', 'show'
]);

Route::apiResource('colors', ColorController::class)->only([
    'index', 'show'
]);

Route::apiResource('brands', BrandController::class)->only([
    'index', 'show'
]);

Route::apiResource('tags', TagController::class)->only([
    'index', 'show'
]);

Route::apiResource('products', ProductController::class)->only([
    'index', 'show'
]);

Route::middleware(['auth:sanctum', 'ability:admin'])->group(function () {
    Route::apiResource('products', ProductController::class)->only([
        'create', 'store', 'update', 'destroy'
    ]);
    Route::apiResource('tags', TagController::class)->only([
        'create', 'store', 'update', 'destroy'
    ]);
    Route::apiResource('brands', BrandController::class)->only([
        'create', 'store', 'update', 'destroy'
    ]);
    Route::apiResource('colors', ColorController::class)->only([
        'create', 'store', 'update', 'destroy'
    ]);
    Route::apiResource('comments', CommentController::class)->only([
        'create', 'store', 'update', 'destroy'
    ]);
    Route::apiResource('blogs', BlogController::class)->only([
        'create', 'store', 'update', 'destroy'
    ]);
    Route::apiResource('sub-categories', SubCategoryController::class)->only([
        'create', 'store', 'update', 'destroy'
    ]);
    Route::apiResource('categories', CategoryController::class)->only([
        'create', 'store', 'update', 'destroy'
    ]);
});


