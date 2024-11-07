<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\CreatePostControllerPage;
use Illuminate\Support\Facades\Route;
use \App\Containers\AppSection\Post\UI\WEB\Controllers\CreatePostController;

Route::post('post', CreatePostController::class)
    ->name('post')
    ->middleware(['auth:web']);


