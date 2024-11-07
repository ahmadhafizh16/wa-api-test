<?php

/**
 * @apiGroup           ChatRoom
 * @apiName            LeaveChatRoom
 *
 * @api                {POST} /v1/chat-rooms/leave/{chat_room_id} Leave Chat Room
 * @apiDescription     Leave chat room
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
 * HTTP/1.1 204 No Content
 * {
 * 
 * }
 */

use App\Containers\AppSection\ChatRoom\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('chat-rooms/leave/{chat_room_id}', [Controller::class, 'leaveChatRoom'])
    ->middleware(['auth:api']);

