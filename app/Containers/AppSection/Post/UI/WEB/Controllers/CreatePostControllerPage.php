<?php

namespace App\Containers\AppSection\Post\UI\WEB\Controllers;

use Illuminate\Contracts\View\View;
use App\Ship\Parents\Controllers\WebController;

class CreatePostControllerPage extends WebController
{
    public function __invoke(): View
    {
        return view('appSection@post::post');
    }
}
