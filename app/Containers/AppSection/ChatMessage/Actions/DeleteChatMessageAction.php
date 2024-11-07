<?php

namespace App\Containers\AppSection\ChatMessage\Actions;

use App\Containers\AppSection\ChatMessage\Tasks\DeleteChatMessageTask;
use App\Containers\AppSection\ChatMessage\UI\API\Requests\DeleteChatMessageRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteChatMessageAction extends ParentAction
{
    public function __construct(
        private readonly DeleteChatMessageTask $deleteChatMessageTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteChatMessageRequest $request): int
    {
        return $this->deleteChatMessageTask->run($request->id);
    }
}
