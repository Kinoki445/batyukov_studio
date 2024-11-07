<?php

use App\Containers\AppSection\Post\UI\WEB\Controllers\CreatePostControllerPage;
use Illuminate\Support\Facades\Route;

Route::post('posts/store', [CreatePostControllerPage::class, 'store'])
    ->middleware(['auth:web']);

