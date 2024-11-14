<?php

namespace App\Containers\AppSection\User\Tasks;

use App\Containers\AppSection\User\Data\Repositories\UserRepository;
use App\Containers\AppSection\User\Models\User;
use App\Containers\AppSection\User\UI\API\Controllers\UserPlaseValue;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateUserTask extends ParentTask
{
    public function __construct(
        private readonly UserRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(UserPlaseValue $data): User
    {
        try {
            $user = $this->repository->create([
                'name' => $data->getUserName(),
                'email' => $data->getUserEmail(),
                'gender' => $data->getUserGender(),
                'birth' => $data->getUserBirth(),
                'password' => $data->getUserPassword(),
            ]);
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }

        return $user;
    }
}
