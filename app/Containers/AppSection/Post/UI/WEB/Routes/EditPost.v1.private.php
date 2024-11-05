<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\UpdatePostController;
use Illuminate\Support\Facades\Route;

Route::get('/post/edit/{id}', [UpdatePostController::class, 'edit'])
    ->name('post_edit')
    ->middleware(['auth:web']);
