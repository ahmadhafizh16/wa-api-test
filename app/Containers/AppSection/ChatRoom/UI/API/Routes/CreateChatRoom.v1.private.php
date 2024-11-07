<?php

/**
 * @apiGroup           ChatRoom
 * @apiName            CreateChatRoom
 *
 * @api                {POST} /v1/chat-rooms Create Chat Room
 * @apiDescription     Create chat room
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiBody            {String} name Chat room name
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *   "data": {
 *       "object": "ChatRoom",
 *       "id": "3e05d0df-988f-4e1e-a63d-ec81dbe987ee",
 *       "name": "test-chat",
 *       "owner_id": 4,
 *       "created_at": "2024-11-07T01:36:14.000000Z"
 *   },
 *   "meta": {
 *       "include": [],
 *       "custom": []
 *   }
 * }
 */

use App\Containers\AppSection\ChatRoom\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('chat-rooms', [Controller::class, 'createChatRoom'])
    ->middleware(['auth:api']);

