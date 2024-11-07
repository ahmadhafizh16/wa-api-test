<?php

/**
 * @apiGroup           ChatMessage
 * @apiName            ListChatMessages
 *
 * @api                {GET} /v1/chat-messages List Chat Messages
 * @apiDescription     Endpoint description here...
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiQuery           {String} limit item perpage
 * @apiQuery           {String} page current pagination page
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 200 OK
 * {
 *   "data": [
 *       {
 *           "id": 1,
 *           "chat_room_id": "0dfd20fa-21da-4a58-a50a-cb5b7aac12bf",
 *           "sender_id": 4,
 *           "content": {
 *               "text": "lets have a chat",
 *               "attachment": "http://api.ggl-api.localhost/storage",
 *               "reply": null
 *           },
 *           "created_at": "2024-11-07 03:48:35.000000"
 *       },
 *       {
 *           "id": 2,
 *           "chat_room_id": "0dfd20fa-21da-4a58-a50a-cb5b7aac12bf",
 *           "sender_id": 4,
 *           "content": {
 *               "text": "lets have a chat",
 *               "attachment": "http://api.ggl-api.localhost/storage",
 *               "reply": null
 *           },
 *           "created_at": "2024-11-07 03:49:01.000000"
 *       },
 *       {
 *           "id": 3,
 *           "chat_room_id": "0dfd20fa-21da-4a58-a50a-cb5b7aac12bf",
 *           "sender_id": 4,
 *           "content": {
 *               "text": "lets have a chat",
 *               "attachment": "http://api.ggl-api.localhost/storage",
 *               "reply": null
 *           },
 *           "created_at": "2024-11-07 03:49:43.000000"
 *       },
 *       {
 *           "id": 4,
 *           "chat_room_id": "0dfd20fa-21da-4a58-a50a-cb5b7aac12bf",
 *           "sender_id": 4,
 *           "content": {
 *               "text": "lets have a chat",
 *               "attachment": "http://api.ggl-api.localhost/storage",
 *               "reply": null
 *           },
 *           "created_at": "2024-11-07 03:52:36.000000"
 *       },
 *       {
 *           "id": 5,
 *           "chat_room_id": "0dfd20fa-21da-4a58-a50a-cb5b7aac12bf",
 *           "sender_id": 4,
 *           "content": {
 *               "text": "lets have a chat",
 *               "attachment": "http://api.ggl-api.localhost/storage",
 *               "reply": null
 *           },
 *           "created_at": "2024-11-07 03:52:37.000000"
 *       },
 *       {
 *           "id": 6,
 *           "chat_room_id": "0dfd20fa-21da-4a58-a50a-cb5b7aac12bf",
 *           "sender_id": 4,
 *           "content": {
 *               "text": "lets have a chat",
 *               "attachment": "http://api.ggl-api.localhost/storage",
 *               "reply": null
 *           },
 *           "created_at": "2024-11-07 03:52:38.000000"
 *       },
 *       {
 *           "id": 7,
 *           "chat_room_id": "0dfd20fa-21da-4a58-a50a-cb5b7aac12bf",
 *           "sender_id": 4,
 *           "content": {
 *               "text": "lets have a chat",
 *               "attachment": "http://api.ggl-api.localhost/storage",
 *               "reply": null
 *           },
 *           "created_at": "2024-11-07 03:52:39.000000"
 *       },
 *       {
 *           "id": 9,
 *           "chat_room_id": "0dfd20fa-21da-4a58-a50a-cb5b7aac12bf",
 *           "sender_id": 4,
 *           "content": {
 *               "text": "lets have a chat",
 *               "attachment": "http://api.ggl-api.localhost/storage",
 *               "reply": null
 *           },
 *           "created_at": "2024-11-07 03:52:43.000000"
 *       },
 *       {
 *           "id": 8,
 *           "chat_room_id": "0dfd20fa-21da-4a58-a50a-cb5b7aac12bf",
 *           "sender_id": 4,
 *           "content": {
 *               "text": "lets have a chat",
 *               "attachment": "http://api.ggl-api.localhost/storage",
 *               "reply": null
 *           },
 *           "created_at": "2024-11-07 03:52:43.000000"
 *       },
 *       {
 *           "id": 10,
 *           "chat_room_id": "0dfd20fa-21da-4a58-a50a-cb5b7aac12bf",
 *           "sender_id": 4,
 *           "content": {
 *               "text": "lets have a chat",
 *               "attachment": "http://api.ggl-api.localhost/storage",
 *               "reply": null
 *           },
 *           "created_at": "2024-11-07 03:52:44.000000"
 *       }
 *   ],
 *   "meta": {
 *       "include": [],
 *       "custom": [],
 *       "pagination": {
 *           "total": 23,
 *           "count": 10,
 *           "per_page": 10,
 *           "current_page": 1,
 *           "total_pages": 3,
 *           "links": {
 *               "next": "http://api.ggl-api.localhost/v1/chat-messages/0dfd20fa-21da-4a58-a50a-cb5b7aac12bf?page=2"
 *           }
 *       }
 *   }
 *}
 */

use App\Containers\AppSection\ChatMessage\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('chat-messages/{chat_room_id}', [Controller::class, 'listChatMessages'])
    ->middleware(['auth:api']);

