<?php

namespace App\Containers\AppSection\Post\UI\WEB\Controllers;

use App\Containers\AppSection\Post\Actions\CreatePostAction;
use App\Containers\AppSection\Post\UI\WEB\Requests\CreatePostRequest;
use App\Containers\AppSection\Post\UI\WEB\Requests\StorePostRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;

class CreatePostController extends WebController
{
    public function create(CreatePostRequest $request)
    {
        return view('appSection@post::post');
    }

    public function store(Request $request, CreatePostAction $action)
    {
        $data = $request->all();

        $action->run($data);
        
        return redirect()->route('home-page')->with('status', 'Post created successfully!');
    }
}
