<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache;

Route::get('/', function () {
    Cache::put('nome', 'Rafael Siqueira', now()->addMinutes(10));

    dd([
        'store' => config('cache.default'),
        'value' => Cache::get('nome'),
    ]);
});