<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\UpdatePostController;
use Illuminate\Support\Facades\Route;

Route::post('post-edit/{id}', UpdatePostController::class)
    ->name('post-update')
    ->middleware(['auth:web']);
