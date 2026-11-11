<?php

use App\Http\Controllers\{PlantController, ReportController};
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

// All pages below are protected: only logged-in users can access them
Route::middleware('auth')->group(function () {
    Route::resource('plants', PlantController::class);

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/pdf', [ReportController::class, 'pdf'])->name('reports.pdf');
    Route::get('/reports/excel', [ReportController::class, 'excel'])->name('reports.excel');
});

require __DIR__.'/auth.php';