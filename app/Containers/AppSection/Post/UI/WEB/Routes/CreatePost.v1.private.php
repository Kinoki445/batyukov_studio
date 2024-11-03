<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\CreatePostController;
use Illuminate\Support\Facades\Route;

Route::get('posts/create', [CreatePostController::class, 'create'])
    ->name('create_post')
    ->middleware(['auth:web']);

Route::post('post', [CreatePostController::class, 'store'])
    ->name('post')
    ->middleware(['auth:web']);


