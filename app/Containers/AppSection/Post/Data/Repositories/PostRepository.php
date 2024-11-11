<?php

namespace App\Containers\AppSection\Post\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class PostRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => 'like',
        'title' => 'like',
        'content' => 'like',
        'image' => 'like',
        'user_id' => '=',
    ];
}
