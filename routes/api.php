<?php

use App\Http\Controllers\PdfController;
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

Route::prefix('/pdf')->group(function () {
    Route::get('/', [PdfController::class, 'index'])->middleware(['auth:sanctum', 'abilities:pdf']);
    Route::get('/{Pdf}', [PdfController::class, 'show'])->middleware(['auth:sanctum', 'abilities:pdf']);
    Route::post('/store', [PdfController::class, 'store'])->middleware(['auth:sanctum', 'abilities:pdf']);
    Route::post('/update', [PdfController::class, 'update'])->middleware(['auth:sanctum', 'abilities:pdf']);
    Route::post('/delete', [PdfController::class, 'delete'])->middleware(['auth:sanctum', 'abilities:pdf']);
});
