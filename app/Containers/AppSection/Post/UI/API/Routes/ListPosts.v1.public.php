<?php

/**
 * @apiGroup           Post
 * @apiName            ListPosts
 *
 * @api                {GET} /v1/posts List Posts
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} parameters here...
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\Post\UI\API\Controllers\ListPostsController;
use Illuminate\Support\Facades\Route;

Route::get('posts', ListPostsController::class)
    ->middleware(['auth:api']);

