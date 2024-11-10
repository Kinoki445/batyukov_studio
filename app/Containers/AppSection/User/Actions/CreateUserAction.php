<?php

namespace App\Containers\AppSection\User\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\Tasks\CreateUserTask;
use App\Containers\AppSection\User\UI\API\Requests\CreateUserRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateUserAction extends ParentAction
{
    public function __construct(
        private readonly CreateUserTask $createUserTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateUserRequest $request): User
    {
        $data = $request->sanitizeInput([
            'name',
            'email',
            'gender',
            'birth',
            'password',
        ]);

        return $this->createUserTask->run($data);
    }
}