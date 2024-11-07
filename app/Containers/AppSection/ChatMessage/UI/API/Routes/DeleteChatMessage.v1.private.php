<?php

/**
 * @apiGroup           ChatMessage
 * @apiName            DeleteChatMessage
 *
 * @api                {DELETE} /v1/chat-messages/:id Delete Chat Message
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

use App\Containers\AppSection\ChatMessage\UI\API\Controllers\Controller;
use Illuminate\Support\Facades\Route;

// Route::delete('chat-messages/{id}', Controller::class)
//     ->middleware(['auth:api']);

