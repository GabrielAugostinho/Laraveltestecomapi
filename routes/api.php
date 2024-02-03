<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::group(['middleware' => 'jwt'], function () {
//     Route::get('/users', [UserController::class, 'index']);
//     Route::get('/users/{id}', [UserController::class, 'show']);
// });


Route::get('/users', [UserController::class, 'index']);
//cadastrar usa o post
Route::post('/users', [UserController::class, 'store']);
//encontrar apenas um usuario
Route::get('/users/{id}', [UserController::class, 'show']);
//editar dados
Route::patch('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);

Route::get('/', function() {
    return response()->json([
        'sucess' => true
    ]);
});
