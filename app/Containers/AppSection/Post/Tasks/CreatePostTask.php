<?php

namespace App\Containers\AppSection\Post\Tasks;

use App\Containers\AppSection\Post\Data\Repositories\PostRepository;
use App\Containers\AppSection\Post\Models\Post;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

use Illuminate\Http\UploadedFile;

class CreatePostTask extends ParentTask
{
    public function __construct(
        protected readonly PostRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Post
    {
        if (isset($data['image'])) {
            $imagePath = $data['image']->store('posts/images', 'public'); 
            $data['image'] = $imagePath; 
        }

        // Создание поста
        return Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'image' => $data['image'] ?? null,
            'user_id' => auth()->id(),
        ]);
    }
}
