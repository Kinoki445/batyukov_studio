<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\DeletePostController;
use App\Containers\AppSection\Post\UI\WEB\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('post/delete/{id}', [DeletePostController::class, 'destroy'])
    ->name('post_delete')
    ->middleware(['auth:web']);

