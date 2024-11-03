<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\UpdatePostController;
use Illuminate\Support\Facades\Route;

Route::post('/post_update/{id}', [UpdatePostController::class, 'update'])
    ->name('post_update')
    ->middleware(['auth:web']);

