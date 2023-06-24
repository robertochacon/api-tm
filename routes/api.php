<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BooksController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'auth:api',
    // 'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('register', [AuthController::class, 'register']);

    //authors
    Route::get('/authors/', [AuthorsController::class, 'index']);
    Route::get('/authors/{id}/', [AuthorsController::class, 'watch']);
    Route::post('/authors/', [AuthorsController::class, 'register']);
    Route::put('/authors/{id}/', [AuthorsController::class, 'update']);
    Route::delete('/authors/{id}/', [AuthorsController::class, 'delete']);

    //categories
    Route::get('/categories/', [CategoriesController::class, 'index']);
    Route::get('/categories/{id}/', [CategoriesController::class, 'watch']);
    Route::post('/categories/', [CategoriesController::class, 'register']);
    Route::put('/categories/{id}/', [CategoriesController::class, 'update']);
    Route::delete('/categories/{id}/', [CategoriesController::class, 'delete']);

    //books
    Route::get('/books/', [BooksController::class, 'index']);
    Route::get('/books/{id}/', [BooksController::class, 'watch']);
    Route::post('/books/', [BooksController::class, 'register']);
    Route::put('/books/{id}/', [BooksController::class, 'update']);
    Route::delete('/books/{id}/', [BooksController::class, 'delete']);

    //users
    Route::get('/users/', [UserController::class, 'index']);
    Route::get('/users/{id}/', [UserController::class, 'watch']);
    Route::post('/users/', [UserController::class, 'register']);
    Route::put('/users/{id}/', [UserController::class, 'update']);
    Route::delete('/users/{id}/', [UserController::class, 'delete']);

});
