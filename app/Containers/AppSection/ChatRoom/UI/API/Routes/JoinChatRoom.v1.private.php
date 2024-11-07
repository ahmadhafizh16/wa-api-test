<?php

/**
 * @apiGroup           ChatRoom
 * @apiName            JoinChatRoom
 *
 * @api                {POST} /v1/chat-rooms/join/{chat_room_id} Join Chat Room
 * @apiDescription     Join chat room
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 201 Created
 * {
 *   
 * }
 */

use App\Containers\AppSection\ChatRoom\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('chat-rooms/join/{chat_room_id}', [Controller::class, 'joinChatRoom'])
    ->middleware(['auth:api']);

