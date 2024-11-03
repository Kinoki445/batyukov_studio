<?php

use App\Containers\AppSection\Authentication\UI\WEB\Controllers\RegisterUserController2;
use Illuminate\Support\Facades\Route;

Route::post('register-action', RegisterUserController2::class)
    ->name('register-action')
    ->middleware(['guest']);


