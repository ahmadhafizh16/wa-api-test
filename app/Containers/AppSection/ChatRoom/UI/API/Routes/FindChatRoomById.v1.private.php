<?php

/**
 * @apiGroup           ChatRoom
 * @apiName            FindChatRoomById
 *
 * @api                {GET} /v1/chat-rooms/:id Find Chat Room By Id
 * @apiDescription     Find Chat Room By Id
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
 *   "data": {
 *       "object": "ChatRoom",
 *       "id": "0dfd20fa-21da-4a58-a50a-cb5b7aac12bf",
 *       "name": "test-chat",
 *       "owner_id": 4,
 *       "created_at": "2024-11-06T14:51:51.000000Z"
 *   },
 *   "meta": {
 *       "include": [],
 *       "custom": []
 *   }
 *}
 */

use App\Containers\AppSection\ChatRoom\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('chat-rooms/{id}', [Controller::class, 'findChatRoomById'])
    ->middleware(['auth:api']);

