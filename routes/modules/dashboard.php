<?php

use App\Http\Livewire\Dashboard\Index;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'dashboard',
    'as' => 'dashboard.',
    'middleware' => ['auth'],
], function () {
    Route::get('/', Index::class)->name('dashboard');
});
