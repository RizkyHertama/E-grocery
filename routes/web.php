<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


// Route untuk sistem auth
Route::get('/register', [RegisterController::class, 'viewRegisterPage'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [AuthController::class, 'viewLoginPage'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Route untuk home
Route::get('/', [ItemsController::class, 'viewHome']);
Route::get('/home', [ItemsController::class, 'viewHome']);

// Route untuk view item detail
Route::get('/viewItemDetail/{id}', [ItemsController::class, 'viewItemDetail']);

// Route bagian cart
Route::get('/cart', [CartController::class, 'viewMyCart']);
Route::post('/addItemToCart', [CartController::class, 'addItemToCart'])->middleware('validCartUser');
Route::delete('/checkout', [CartController::class, 'checkout']);
Route::delete('/DeleteItemCart/{id}', [CartController::class, 'DeleteItemCart']);
// Route::get('/successCheckout', [ItemsController::class, 'viewHome']);

Route::get('/successCheckout', function () {
    return view('successCheckout');
});


// Route bagian Admin maintenance account
Route::get('/maintenance', [UsersController::class, 'maintenance'])->middleware('admin');
Route::delete('/deleteAccount/{user_id}', [UsersController::class, 'deleteAccount'])->middleware('admin');
Route::get('/updateRole/{user_id}', [UsersController::class, 'updateRole'])->middleware('admin');
Route::put('/updateRoleDetail/{user_id}', [UsersController::class, 'updateRoleDetail'])->middleware('admin');

// Route bagian profile
Route::get('profile', [ProfileController::class, 'index']);
Route::post('profile', [ProfileController::class, 'update']);


// Route localzation
if (file_exists(app_path('Http/Controllers/LocalizationController.php')))
{
    Route::get('lang/{locale}', [App\Http\Controllers\LocalizationController::class , 'lang']);
}
