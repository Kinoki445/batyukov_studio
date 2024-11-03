<?php

namespace App\Containers\AppSection\Post\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\Post\Actions\ListPostsAction;
use App\Containers\AppSection\Post\UI\API\Requests\ListPostsRequest;
use App\Containers\AppSection\Post\UI\API\Transformers\PostTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Prettus\Repository\Exceptions\RepositoryException;

class ListPostsController extends ApiController
{
    public function __construct(
        private readonly ListPostsAction $action
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function __invoke(ListPostsRequest $request): array
    {
        $posts = $this->action->run($request);

        return $this->transform($posts, PostTransformer::class);
    }
}
