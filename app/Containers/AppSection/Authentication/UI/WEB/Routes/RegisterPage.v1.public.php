<?php

use App\Containers\AppSection\Authentication\UI\WEB\Controllers\Controller;
use App\Containers\AppSection\Authentication\UI\WEB\Controllers\RegisterPage;
use Illuminate\Support\Facades\Route;

Route::get('register-page', RegisterPage::class)
    ->name('register-page');
