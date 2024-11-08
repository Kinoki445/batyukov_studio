<?php

namespace App\Containers\AppSection\Post\Tasks;

use App\Containers\AppSection\Post\Data\Repositories\PostRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Containers\AppSection\Post\Models\Post;

class DeletePostTask extends ParentTask
{
    public function __construct(
        protected readonly PostRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(int $id): int
    {
        try {
            $post = $this->repository->find($id);
        } catch (ModelNotFoundException $exception) {
            throw new NotFoundException();
        }

        if ($this->repository->delete($post->id)) {
            unlink("storage/$post->image");
            return $post->id;
        }

        throw new DeleteResourceFailedException();
    }
}
