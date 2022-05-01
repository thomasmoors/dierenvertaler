<?php

use App\Http\Controllers\TranslationController;
use App\Http\Middleware\DetectLanguage;
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

Route::post('translate', [TranslationController::class, 'translate'])->middleware([DetectLanguage::class]);
Route::get('targetLanguages', [TranslationController::class, 'targetLanguages'])->middleware([DetectLanguage::class]);


Route::get('/', function () {
    return view('welcome');
});

