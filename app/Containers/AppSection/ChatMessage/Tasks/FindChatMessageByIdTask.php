<?php

namespace App\Containers\AppSection\ChatMessage\Tasks;

use App\Containers\AppSection\ChatMessage\Data\Repositories\ChatMessageRepository;
use App\Containers\AppSection\ChatMessage\Models\ChatMessage;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindChatMessageByIdTask extends ParentTask
{
    public function __construct(
        protected readonly ChatMessageRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ChatMessage
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
