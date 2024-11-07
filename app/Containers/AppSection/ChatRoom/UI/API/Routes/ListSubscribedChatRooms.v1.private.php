<?php

/**
 * @apiGroup           ChatRoom
 * @apiName            ListSubscribedChatRooms
 *
 * @api                {GET} /v1/chat-rooms List of Subscribed Chat Rooms
 * @apiDescription     List of Subscribed Chat Rooms
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiQuery           {String} limit item count per page
 * @apiQuery           {String} page current page number
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *   "data": [
 *       {
 *           "object": "ChatRoom",
 *           "id": "f3802890-a8fd-42b4-af43-87400eaf0621",
 *           "name": "test-chat",
 *           "owner_id": 4,
 *           "created_at": "2024-11-07T01:35:01.000000Z"
 *       },
 *       {
 *           "object": "ChatRoom",
 *           "id": "3e05d0df-988f-4e1e-a63d-ec81dbe987ee",
 *           "name": "test-chat",
 *           "owner_id": 4,
 *           "created_at": "2024-11-07T01:36:14.000000Z"
 *       }
 *   ],
 *   "meta": {
 *       "include": [],
 *       "custom": [],
 *       "pagination": {
 *           "total": 4,
 *           "count": 2,
 *           "per_page": 2,
 *           "current_page": 2,
 *           "total_pages": 2,
 *           "links": {
 *               "previous": "http://api.ggl-api.localhost/v1/chat-rooms?page=1"
 *           }
 *       }
 *   }
 * }
 */

use App\Containers\AppSection\ChatRoom\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('chat-rooms', [Controller::class, 'getAllSubscribedChatRooms'])
    ->middleware(['auth:api']);

