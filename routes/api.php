<?php

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/projects', [ProjectController::class, 'index']);
Route::post('/contact', [ContactController::class, 'store']);
use Illuminate\Support\Facades\Artisan;

Route::get('/run-migrate', function () {
    try {
        Artisan::call('migrate:fresh', ['--force' => true]);
        return "تم إنشاء الجداول بنجاح! 😍";
    } catch (\Exception $e) {
        return "حدث خطأ: " . $e->getMessage();
    }
});
