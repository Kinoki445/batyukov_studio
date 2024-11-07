<?php

namespace App\Containers\AppSection\Post\UI\WEB\Controllers;

use App\Containers\AppSection\Post\Actions\CreatePostAction;
use App\Containers\AppSection\Post\UI\WEB\Requests\CreatePostRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\RedirectResponse;

class CreatePostController extends WebController
{
    public function __invoke(CreatePostRequest $request, CreatePostAction $action)  : RedirectResponse
    {
        $action->run($request->all());
        return redirect()->route('home-page')->with('status', 'Post created successfully!');
    }
}
