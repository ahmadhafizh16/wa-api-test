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
 *     // Insert the response of the request here...
 * }
 */

use App\Containers\AppSection\ChatMessage\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::post('chat-messages/{chat_room_id}', [Controller::class, 'sendMessage'])
    ->middleware(['auth:api']);

