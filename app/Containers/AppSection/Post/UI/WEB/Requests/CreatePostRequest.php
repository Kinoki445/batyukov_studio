<?php

namespace App\Containers\AppSection\Post\UI\WEB\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreatePostRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => null,
        'roles' => null,
    ];

    protected array $decode = [
        // 'id',
    ];

    protected array $urlParameters = [ ];

    public function rules(): array
    {
        return [
            'title' => 'required|min:2|max:50',
            'content' => 'required|min:2|max:500',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
