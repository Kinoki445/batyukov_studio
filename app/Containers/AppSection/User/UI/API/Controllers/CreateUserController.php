<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\User\Actions\CreateUserAction;
use App\Containers\AppSection\User\UI\API\Requests\CreateUserRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use App\Ship\Parents\Values\Value;
use Illuminate\Http\JsonResponse;

class CreateUserController extends ApiController
{
    public function __construct(
        private readonly CreateUserAction $action,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws InvalidTransformerException
     * @throws IncorrectIdException
     */
    public function __invoke(CreateUserRequest $request): JsonResponse
    {
        $value = new UserPlaseValue(
            $request->input('name'),
            $request->input('email'),
            $request->input('gender'),
            $request->input('birth'),
            $request->input('password')
        );

        $user = $this->action->run($value);
        return $this->created($this->transform($user, UserTransformer::class));
    }
}

class UserPlaseValue extends Value
{
    protected string $name;
    protected string $email;
    protected string $gender;
    protected string $birth;
    protected string $password;

    public function __construct(string $name, string $email, string $gender, string $birth, string $password)
    {
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
        $this->birth = $birth;
        $this->password = $password;
    }

    public function getUserName(): string
    {
        return $this->name;
    }

    public function getUserEmail(): string
    {
        return $this->email;
    }

    public function getUserGender(): string
    {
        return $this->gender;
    }

    public function getUserBirth(): string
    {
        return $this->birth;
    }

    public function getUserPassword(): string
    {
        return $this->password;
    }
}
