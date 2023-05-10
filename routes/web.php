<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportActivityController;

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

Route::get('catalog/', [ReportActivityController::class, 'index'])
->name('catalog.index');
Route::get('catalog/dashboard', [ReportActivityController::class, 'dashboard'])
->name('catalog.dashboard');
Route::get('catalog/create', [ReportActivityController::class, 'create'])
->name('catalog.create');
Route::get('catalog/edit/{param}', [ReportActivityController::class, 'edit'])
->name('catalog.edit');
Route::post('catalog/store', [ReportActivityController::class, 'store'])
->name('catalog.store');
Route::post('catalog/update/{param}', [ReportActivityController::class, 'update'])
->name('catalog.update');
Route::delete('/catalog/{param}', [ReportActivityController::class, 'delete'])
->name('catalog.delete');
