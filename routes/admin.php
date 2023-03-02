<?php

use Illuminate\Support\Facades\Route;

$prepend_name = 'admin';

Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name("$prepend_name.home.index");

Route::get('companies', [\App\Http\Controllers\Admin\CompanyController::class, 'index'])->name("$prepend_name.companies.index");
Route::get('companies/create', [\App\Http\Controllers\Admin\CompanyController::class, 'create'])->name("$prepend_name.companies.create");
Route::get('companies/{company}/edit', [\App\Http\Controllers\Admin\CompanyController::class, 'edit'])->name("$prepend_name.companies.edit");
Route::get('companies/{company}', [\App\Http\Controllers\Admin\CompanyController::class, 'show'])->name("$prepend_name.companies.show");

Route::group(['prefix' => 'ajax'], function () use ($prepend_name) {
    Route::post('datatable-companies', [\App\Http\Controllers\Admin\CompanyController::class, 'datatable']);
    Route::post('companies', [\App\Http\Controllers\Admin\CompanyController::class, 'store']);
    Route::delete('companies/{company}', [\App\Http\Controllers\Admin\CompanyController::class, 'destroy'])->name("$prepend_name.companies.destroy");
});
