<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\CreatePostControllerPage;
use Illuminate\Support\Facades\Route;

Route::get('create_post', CreatePostControllerPage::class)
    ->name('create_post')
    ->middleware(['auth:web']);

