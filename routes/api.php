<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ShopController;


// Route::get('/api/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route for authentication
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');

// Route for recipes
Route::get('/recipes/all', [RecipeController::class, 'index']); // Get all recipes
Route::get('/recipes/{id}', [RecipeController::class, 'show']); // Get a recipe by ID
Route::post('/recipes/new', [RecipeController::class, 'store']); // Store a new recipe

// Route for shops
Route::get('/shops/all', [ShopController::class, 'index']); // Get all shops
Route::get('/shops/{id}', [ShopController::class, 'show']); // Get shop details by ID
Route::post('/shops/new', [ShopController::class, 'store']); // Store a new shop
