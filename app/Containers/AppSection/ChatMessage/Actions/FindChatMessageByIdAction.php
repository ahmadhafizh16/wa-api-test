<?php

namespace App\Containers\AppSection\ChatMessage\Actions;

use App\Containers\AppSection\ChatMessage\Models\ChatMessage;
use App\Containers\AppSection\ChatMessage\Tasks\FindChatMessageByIdTask;
use App\Containers\AppSection\ChatMessage\UI\API\Requests\FindChatMessageByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindChatMessageByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindChatMessageByIdTask $findChatMessageByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindChatMessageByIdRequest $request): ChatMessage
    {
        return $this->findChatMessageByIdTask->run($request->id);
    }
}
