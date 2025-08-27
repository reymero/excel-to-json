<?php

use App\Http\Controllers\ExcelController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/upload', function () {
    return view('upload');
});

Route::post('upload-excel', [ExcelController::class, 'uploadExcel'])->name('upload_excel');

Route::post('/send-excel-email', [ExcelController::class, 'sendEmail'])->name('send_excel_email');
