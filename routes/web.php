<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/fetch-news', [NewsController::class, 'fetchAndStoreNews'])->name('fetch.news');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
