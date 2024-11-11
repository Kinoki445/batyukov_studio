<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\UpdatePostController;
use Illuminate\Support\Facades\Route;
use App\Containers\AppSection\Post\UI\WEB\Controllers\UpdatePostControllerPage;

Route::get('/post-update/{id}', UpdatePostControllerPage::class)
    ->name('post-edit')
    ->middleware(['auth:web']);
