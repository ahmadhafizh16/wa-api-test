<?php

/**
 * @apiGroup           ChatMessage
 * @apiName            SendChatMessage
 *
 * @api                {POST} /v1/chat-messages/{chat_room_id} Send Chat Message to specified chat rooom id
 * @apiDescription     Send Chat Message to specified chat rooom id
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
 *       "id": 23,
 *       "chat_room_id": "0dfd20fa-21da-4a58-a50a-cb5b7aac12bf",
 *       "sender_id": 4,
 *       "content": {
 *           "text": "lets have a chat",
 *           "attachment": "http://api.ggl-api.localhost/storage",
 *           "reply": {
 *               "message_id": 2,
 *               "user_name": "name",
 *               "message": "lets have a chat"
 *           }
 *       },
 *       "created_at": "2024-11-07 05:23:07.479173"
 *   },
 *   "meta": {
 *       "include": [],
 *       "custom": []
 *   }
 *}
 */

use App\Containers\AppSection\ChatMessage\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('chat-messages/{chat_room_id}', [Controller::class, 'sendMessage'])
    ->middleware(['auth:api']);

