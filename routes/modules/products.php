<?php

use App\Http\Livewire\Products\Index;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'products',
    'as' => 'products.',
    'middleware' => ['auth'],
], function () {
    Route::get('/', Index::class)->name('index');
    Route::get('/list', [Index::class, 'list'])->name('list');
});
