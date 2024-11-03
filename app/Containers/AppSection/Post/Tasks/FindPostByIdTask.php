<?php

namespace App\Containers\AppSection\Post\Tasks;

use App\Containers\AppSection\Post\Data\Repositories\PostRepository;
use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindPostByIdTask extends ParentTask
{
    public function __construct(
        protected readonly PostRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): Post
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
