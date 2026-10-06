<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/expenses');
Route::resource('expenses', ExpenseController::class)->except(['show']);
