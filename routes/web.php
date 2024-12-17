<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/report/{location}', [ReportController::class, 'submit_report'])->name('report');
