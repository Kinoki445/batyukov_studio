<?php

namespace App\Containers\AppSection\Authentication\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use Illuminate\Contracts\View\View;

class RegisterPage extends WebController
{
    public function __invoke(): View
    {
        return view('appSection@authentication::regiser');
    }
}