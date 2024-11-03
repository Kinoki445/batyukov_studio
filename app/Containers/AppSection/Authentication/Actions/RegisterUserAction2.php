<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Containers\AppSection\Authentication\Tasks\RegisterUserTask;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\Log;

class RegisterUserAction2 extends ParentAction
{
    public function run(array $data)
    {
        return app(RegisterUserTask::class)->run($data);
    }
}
