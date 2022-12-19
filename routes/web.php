<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiController;
use App\Http\Controllers\AiTwoController;
use App\Http\Controllers\ResumeController;

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


// text
Route::get('/ai',[AiController::class,'index'])->name('ai.index');
Route::post('/ai',[AiController::class,'result'])->name('ai.result');

// image
Route::get('/ai-two',[AiTwoController::class,'index'])->name('aitwo.index');
Route::post('/ai-two',[AiTwoController::class,'generateimage'])->name('aitwo.generateimage');

// resume
Route::get('/ai-resume',[ResumeController::class,'index'])->name('resume.index');
Route::post('/ai-resume',[ResumeController::class,'store'])->name('resume.store');
Route::get('/ai-resume/pdf', [ResumeController::class, 'createPDF']);