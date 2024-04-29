<?php


use App\Http\Controllers\Pedido\PedidoController;
use App\Http\Controllers\Cliente\ClienteController;

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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Ruta para obtener todos los clientes
Route::get('/clientes', [ClienteController::class, 'index']);

Route::get('/pedidos', [PedidoController::class, 'index']);
//Route::get('/clientes', [ClienteController::class, 'index']);



