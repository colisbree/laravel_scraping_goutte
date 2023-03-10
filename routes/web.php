<?php

use App\Http\Controllers\ScraperController;
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

Route::get('scraper', [ScraperController::class, 'scraper'])->name('scraper');
Route::get('handiscrap', [ScraperController::class, 'handiscrap'])->name('handiscrap');
Route::get('handiscrap2', [ScraperController::class, 'handiscrap2'])->name('handiscrap2');
Route::get('handiscrap3', [ScraperController::class, 'handiscrap3'])->name('handiscrap3');