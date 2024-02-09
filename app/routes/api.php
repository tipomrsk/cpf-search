<?php

use App\Http\Controllers\{Companies, OrdersTracking, Receiver, User, Orders};
use Illuminate\Http\Request;
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

// Rota de testes
Route::get('/test', function () {
    return response()->json(['message' => 'Hello World!'], 200);
});


Route::get('/get-data', [User::class, 'getData']);


/**
 * TODO - COLOCAR AS ROTAS DENTRO DE UM PREFIXO PARA MANTER A ORGANIZAÇÃO
 */

// Rota para consultar e persistir as empresas
Route::get('/consult-persist-company', [Companies::class, 'consultPersistCompany']);

// Rota para consultar e persistir os pedidos
Route::get('/consult-persist-orders', [Orders::class, 'consultPersistOrders']);


Route::prefix('receiver')->group(function () {
    Route::get('/orders', [Receiver::class, 'getReceiverOrders']);
});

Route::prefix('orders')->group(function () {
    Route::get('/status', [OrdersTracking::class, 'getOrdersStatusByUuid']);
});





