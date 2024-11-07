<?php

/**
 * @apiGroup           ChatMessage
 * @apiName            DeleteChatMessage
 *
 * @api                {DELETE} /v1/chat-messages/:chat_room_id Delete Chat Message
 * @apiDescription     Delete Chat Message
 *
 * @apiVersion         1.0.0
 * @apiPermission      Authenticated ['permissions' => '', 'roles' => '']
 *
 * @apiHeader          {String} accept=application/json
 * @apiHeader          {String} authorization=Bearer
 *
 * @apiParam           {String} id message id to be deleted
 *
 * @apiSuccessExample  {json} Success-Response:
 * HTTP/1.1 204 No Content
 * {
 * 
 * }
 */

use App\Containers\AppSection\ChatMessage\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::delete('chat-messages/{chat_room_id}', [Controller::class, 'deleteChatMessage'])
    ->middleware(['auth:api']);

