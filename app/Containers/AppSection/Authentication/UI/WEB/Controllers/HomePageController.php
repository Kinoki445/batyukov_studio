<?php

namespace App\Containers\AppSection\Authentication\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use Illuminate\Contracts\View\View;
use App\Containers\AppSection\Post\Models\Post;

class HomePageController extends WebController
{
    public function __invoke(): View
    {
        return view('appSection@authentication::home', [
            'posts' => Post::with('user')->get()
        ]);
    }
}
