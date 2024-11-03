<?php

namespace App\Containers\AppSection\Post\UI\WEB\Controllers;

use App\Containers\AppSection\Post\Actions\DeletePostAction;
use App\Containers\AppSection\Post\UI\WEB\Requests\DeletePostRequest;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Http\Request;

class DeletePostController extends WebController
{
    public function destroy(Request $request, DeletePostAction $action,  $id)
    {
        $action->run($id);
        return redirect()->route('home-page')->with('status', 'Post Deleted successfully!');
    }
}
