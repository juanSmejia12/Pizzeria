<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\BranchController;
use App\Http\Controllers\api\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\api\PizzaController;
use App\Http\Controllers\PizzaSizeController;
use App\Http\Controllers\api\IngredientController;
use App\Http\Controllers\api\PizzaIngredientController;
use App\Http\Controllers\PizzaRawMaterialController;
use App\Http\Controllers\ExtraIngredientController;
use App\Http\Controllers\OrderExtraIngredientController;
use App\Http\Controllers\OrderPizzaController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\SupplierController;

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

// Branches
Route::post('/branches', [BranchController::class, 'store'])->name('branches.store');
Route::get('/branches', [BranchController::class, 'index'])->name('branches');
Route::delete('/branches/{branch}', [BranchController::class, 'destroy'])->name('branches.destroy');
Route::get('/branches/{branch}', [BranchController::class, 'show'])->name('branches.show');
Route::put('/branches/{branch}', [BranchController::class, 'update'])->name('branches.update');

// Clients
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
Route::get('/clients', [ClientController::class, 'index'])->name('clients');
Route::delete('/clients/{client}', [ClientController::class, 'destroy'])->name('clients.destroy');
Route::get('/clients/{client}', [ClientController::class, 'show'])->name('clients.show');
Route::put('/clients/{client}', [ClientController::class, 'update'])->name('clients.update');

// Employees
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');

// Extra Ingredients
Route::post('/extra-ingredients', [ExtraIngredientController::class, 'store'])->name('extraIngredients.store');
Route::get('/extra-ingredients', [ExtraIngredientController::class, 'index'])->name('extraIngredients');
Route::delete('/extra-ingredients/{extraIngredient}', [ExtraIngredientController::class, 'destroy'])->name('extraIngredients.destroy');
Route::get('/extra-ingredients/{extraIngredient}', [ExtraIngredientController::class, 'show'])->name('extraIngredients.show');
Route::put('/extra-ingredients/{extraIngredient}', [ExtraIngredientController::class, 'update'])->name('extraIngredients.update');

// Ingredients
Route::post('/ingredients', [IngredientController::class, 'store'])->name('ingredients.store');
Route::get('/ingredients', [IngredientController::class, 'index'])->name('ingredients');
Route::delete('/ingredients/{ingredient}', [IngredientController::class, 'destroy'])->name('ingredients.destroy');
Route::get('/ingredients/{ingredient}', [IngredientController::class, 'show'])->name('ingredients.show');
Route::put('/ingredients/{ingredient}', [IngredientController::class, 'update'])->name('ingredients.update');

// Orders
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::delete('/orders/{order}', [OrderController::class, 'destroy'])->name('orders.destroy');
Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
Route::put('/orders/{order}', [OrderController::class, 'update'])->name('orders.update');

// Order Extra Ingredients
Route::post('/order-extra-ingredients', [OrderExtraIngredientController::class, 'store'])->name('orderExtraIngredients.store');
Route::get('/order-extra-ingredients', [OrderExtraIngredientController::class, 'index'])->name('orderExtraIngredients');
Route::delete('/order-extra-ingredients/{id}', [OrderExtraIngredientController::class, 'destroy'])->name('orderExtraIngredients.destroy');
Route::get('/order-extra-ingredients/{id}', [OrderExtraIngredientController::class, 'show'])->name('orderExtraIngredients.show');
Route::put('/order-extra-ingredients/{id}', [OrderExtraIngredientController::class, 'update'])->name('orderExtraIngredients.update');

// Order Pizzas
Route::post('/order-pizzas', [OrderPizzaController::class, 'store'])->name('orderPizzas.store');
Route::get('/order-pizzas', [OrderPizzaController::class, 'index'])->name('orderPizzas');
Route::delete('/order-pizzas/{id}', [OrderPizzaController::class, 'destroy'])->name('orderPizzas.destroy');
Route::get('/order-pizzas/{id}', [OrderPizzaController::class, 'show'])->name('orderPizzas.show');
Route::put('/order-pizzas/{id}', [OrderPizzaController::class, 'update'])->name('orderPizzas.update');

// Pizzas
Route::post('/pizzas', [PizzaController::class, 'store'])->name('pizzas.store');
Route::get('/pizzas', [PizzaController::class, 'index'])->name('pizzas');
Route::delete('/pizzas/{pizza}', [PizzaController::class, 'destroy'])->name('pizzas.destroy');
Route::get('/pizzas/{pizza}', [PizzaController::class, 'show'])->name('pizzas.show');
Route::put('/pizzas/{pizza}', [PizzaController::class, 'update'])->name('pizzas.update');

// Pizza Ingredients
Route::post('/pizza-ingredients', [PizzaIngredientController::class, 'store'])->name('pizzaIngredients.store');
Route::get('/pizza-ingredients', [PizzaIngredientController::class, 'index'])->name('pizzaIngredients');
Route::delete('/pizza-ingredients/{id}', [PizzaIngredientController::class, 'destroy'])->name('pizzaIngredients.destroy');
Route::get('/pizza-ingredients/{id}', [PizzaIngredientController::class, 'show'])->name('pizzaIngredients.show');
Route::put('/pizza-ingredients/{id}', [PizzaIngredientController::class, 'update'])->name('pizzaIngredients.update');

// Pizza Raw Materials
Route::post('/pizza-raw-materials', [PizzaRawMaterialController::class, 'store'])->name('pizzaRawMaterials.store');
Route::get('/pizza-raw-materials', [PizzaRawMaterialController::class, 'index'])->name('pizzaRawMaterials');
Route::delete('/pizza-raw-materials/{id}', [PizzaRawMaterialController::class, 'destroy'])->name('pizzaRawMaterials.destroy');
Route::get('/pizza-raw-materials/{id}', [PizzaRawMaterialController::class, 'show'])->name('pizzaRawMaterials.show');
Route::put('/pizza-raw-materials/{id}', [PizzaRawMaterialController::class, 'update'])->name('pizzaRawMaterials.update');

// Pizza Sizes
Route::post('/pizza-sizes', [PizzaSizeController::class, 'store'])->name('pizzaSizes.store');
Route::get('/pizza-sizes', [PizzaSizeController::class, 'index'])->name('pizzaSizes');
Route::delete('/pizza-sizes/{pizzaSize}', [PizzaSizeController::class, 'destroy'])->name('pizzaSizes.destroy');
Route::get('/pizza-sizes/{pizzaSize}', [PizzaSizeController::class, 'show'])->name('pizzaSizes.show');
Route::put('/pizza-sizes/{pizzaSize}', [PizzaSizeController::class, 'update'])->name('pizzaSizes.update');

// Profile (API-style, optional)
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Purchases
Route::post('/purchases', [PurchaseController::class, 'store'])->name('purchases.store');
Route::get('/purchases', [PurchaseController::class, 'index'])->name('purchases');
Route::delete('/purchases/{purchase}', [PurchaseController::class, 'destroy'])->name('purchases.destroy');
Route::get('/purchases/{purchase}', [PurchaseController::class, 'show'])->name('purchases.show');
Route::put('/purchases/{purchase}', [PurchaseController::class, 'update'])->name('purchases.update');

// Raw Materials
Route::post('/raw-materials', [RawMaterialController::class, 'store'])->name('rawMaterials.store');
Route::get('/raw-materials', [RawMaterialController::class, 'index'])->name('rawMaterials');
Route::delete('/raw-materials/{rawMaterial}', [RawMaterialController::class, 'destroy'])->name('rawMaterials.destroy');
Route::get('/raw-materials/{rawMaterial}', [RawMaterialController::class, 'show'])->name('rawMaterials.show');
Route::put('/raw-materials/{rawMaterial}', [RawMaterialController::class, 'update'])->name('rawMaterials.update');

// Suppliers
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers');
Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
Route::get('/suppliers/{supplier}', [SupplierController::class, 'show'])->name('suppliers.show');
Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');

// Users
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
