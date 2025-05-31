<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\PizzaSizeController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PizzaIngredientController;
use App\Http\Controllers\PizzaRawMaterialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return '¡Conexión exitosa a la base de datos!';
    } catch (\Exception $e) {
        return 'Error de conexión: ' . $e->getMessage();
    }
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Clientes
Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('/clients/{client}/edit', [ClientController::class, 'edit'])->name('clients.edit');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');


// Usuarios
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Empleados
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{id}', [EmployeeController::class, 'update'])->name('employees.update');

Route::resource('branches', BranchController::class);

Route::resource('orders', OrderController::class);

Route::resource('pizzas', PizzaController::class);

// PizzaSize
Route::resource('pizza_sizes', PizzaSizeController::class);

// Ingredient
Route::resource('ingredients', IngredientController::class);

// PizzaIngredient
Route::resource('pizza-ingredients', PizzaIngredientController::class);

// PizzaRawMaterial
Route::resource('pizza-raw-materials', PizzaRawMaterialController::class);

//order_extra_ingredient
require __DIR__.'/auth.php';