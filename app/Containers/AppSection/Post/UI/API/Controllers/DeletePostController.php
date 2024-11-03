<?php

namespace App\Containers\AppSection\Post\UI\API\Controllers;

use App\Containers\AppSection\Post\Actions\DeletePostAction;
use App\Containers\AppSection\Post\UI\API\Requests\DeletePostRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

class DeletePostController extends ApiController
{
    public function __construct(
        private readonly DeletePostAction $action,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function __invoke(DeletePostRequest $request): JsonResponse
    {
        $this->action->run($request);

        return $this->noContent();
    }
}
