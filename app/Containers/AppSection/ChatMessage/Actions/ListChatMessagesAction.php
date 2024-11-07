<?php

namespace App\Containers\AppSection\ChatMessage\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ChatMessage\Tasks\ListChatMessagesTask;
use App\Containers\AppSection\ChatMessage\UI\API\Requests\ListChatMessagesRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListChatMessagesAction extends ParentAction
{
    public function __construct(
        private readonly ListChatMessagesTask $listChatMessagesTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListChatMessagesRequest $request): mixed
    {
        return $this->listChatMessagesTask->run($request->chat_room_id);
    }
}
