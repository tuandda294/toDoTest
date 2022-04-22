<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use app\http\Controllers\API\TodosController;

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

// Route::get('/index', function (Request $request) {
//     $todos = App\Models\Todo::get();
//     return response()->json($todos);
// });

Route::get('/index', [TodosController::class, 'index']);
