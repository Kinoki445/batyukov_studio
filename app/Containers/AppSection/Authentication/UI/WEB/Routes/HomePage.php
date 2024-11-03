<?php

use App\Containers\AppSection\Authentication\UI\WEB\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;
use App\Containers\AppSection\Post\Models\Post;

Route::get('/', HomePageController::class)
    ->name('home-page');
