<?php

namespace App\Containers\AppSection\Post\Tasks;

use App\Containers\AppSection\Post\Data\Repositories\PostRepository;
use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdatePostTask extends ParentTask
{
    public function __construct(
        protected readonly PostRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): Post
    {

        try {
            $post = $this->repository->find($id);
        } catch (ModelNotFoundException $exception) {
            throw new NotFoundException();
        }

        if (isset($data['image'])) {
            $post->clearMediaCollection('image');
            $post->addMedia($data['image']);
        }
        
        $post->update($data);

        return $post;
    }
}
