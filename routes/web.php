<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Include modular routes
require __DIR__ . '/auth.php';
require __DIR__ . '/student.php';
require __DIR__ . '/instructor.php';
