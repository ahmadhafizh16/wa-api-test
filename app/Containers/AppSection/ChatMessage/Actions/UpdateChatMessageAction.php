<?php

namespace App\Containers\AppSection\ChatMessage\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ChatMessage\Models\ChatMessage;
use App\Containers\AppSection\ChatMessage\Tasks\UpdateChatMessageTask;
use App\Containers\AppSection\ChatMessage\UI\API\Requests\UpdateChatMessageRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateChatMessageAction extends ParentAction
{
    public function __construct(
        private readonly UpdateChatMessageTask $updateChatMessageTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateChatMessageRequest $request): ChatMessage
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateChatMessageTask->run($data, $request->id);
    }
}
