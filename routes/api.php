<?php

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

//api/v1
Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1', 'middleware' => 'auth:sanctum'], function() {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('invoices', InvoiceController::class);
    Route::post('invoices/bulk',['uses' => 'InvoiceController@bulkStore']);
});


// {
//     "admin":"1|zmRH73Tc3pCRBB738ISQtihcprWAFKbjW6LNNVtP8a85f2f4",
//     "update":"2|w3PqggetU3j1RbqSDC36weNcvFTYFoWx9rmZJUzGc668aab8",
//     "basic":"3|WAgjBAavaRiD7gM5emexwQk7wISXfjpAlPU86n3Q1f54a60c"
// }