<?php

namespace App\Containers\AppSection\User\UI\API\Controllers;

use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\User\Actions\CreateUserAction;
use App\Containers\AppSection\User\UI\API\Requests\CreateUserRequest;
use App\Containers\AppSection\User\UI\API\Transformers\UserTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
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
        $user = $this->action->run($request);

        return $this->created($this->transform($user, UserTransformer::class));
    }
}
