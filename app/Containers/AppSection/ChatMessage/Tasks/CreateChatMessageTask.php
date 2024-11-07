<?php

namespace App\Containers\AppSection\ChatMessage\Tasks;

use App\Containers\AppSection\ChatMessage\Data\Repositories\ChatMessageRepository;
use App\Containers\AppSection\ChatMessage\Models\ChatMessage;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateChatMessageTask extends ParentTask
{
    public function __construct(
        protected readonly ChatMessageRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): ChatMessage
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception $e) {
            throw new CreateResourceFailedException($e->getMessage());
        }
    }
}
