<?php

namespace App\Containers\AppSection\Post\UI\WEB\Controllers;

use App\Containers\AppSection\Post\Data\Repositories\PostRepository;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;

class UpdatePostControllerPage extends WebController
{
    public function __invoke(Request $request)
    {
        $post = app(PostRepository::class)->findById($request->id);
        return view('appSection@post::post-edit', [
            'post' => $post,
        ]);
    }
}
