<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\BranchController;
use App\Http\Controllers\api\ClientController;

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

Route::post('/branches', [BranchController::class, 'store'])->name('branches.store');
Route::get('/branches', [BranchController::class, 'index'])->name('branches');
Route::delete('/branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');
Route::get('/branches/{branch}', [BranchController::class, 'show'])->name('branches.show');
Route::put('/branches/{branch}', [BranchController::class, 'update'])->name('branches.update');

Route::post('/clients', [BranchController::class, 'store'])->name('clients.store');
Route::get('/clients', [BranchController::class, 'index'])->name('clients');
Route::delete('/clients/{client}', [BranchController::class, 'destroy'])->name('branches.destroy');
Route::get('/clients/{client}', [BranchController::class, 'show'])->name('clients.show');
Route::put('/clients/{client}', [BranchController::class, 'update'])->name('clients.update');