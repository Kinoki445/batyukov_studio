<?php

namespace App\Containers\AppSection\Post\UI\WEB\Controllers;

use App\Containers\AppSection\Post\Actions\UpdatePostAction;
use App\Containers\AppSection\Post\Data\Repositories\PostRepository;
use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;

class UpdatePostController extends WebController
{
    public function __invoke(Request $request, UpdatePostAction $action,)
    {
        $data = $request->all();

        $action->run($data);
        return redirect()->route('home-page')->with('status', 'Post updated successfully!');
    }
}
