<?php

namespace App\Containers\AppSection\Post\Models;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Http\Client\Request;
use Vinkla\Hashids\Facades\Hashids;

class Post extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Post';

    protected $fillable = [
        'title',
        'content',
        'image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
