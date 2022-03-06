<?php

use App\Http\Controllers\AuthorsController;
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

Route::get('/', function () {
    return view('welcome');
});

//Route::get('author/list/{page?}/{perPage?}', [AuthorsController::class, 'list']);

Route::get('author/list', [AuthorsController::class, 'list']);

Route::post('author/add', [AuthorsController::class, 'add']);

Route::post('author/update', [AuthorsController::class, 'update']);
