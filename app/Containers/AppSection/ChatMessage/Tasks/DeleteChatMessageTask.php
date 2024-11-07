<?php

namespace App\Containers\AppSection\ChatMessage\Tasks;

use App\Containers\AppSection\ChatMessage\Data\Repositories\ChatMessageRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DeleteChatMessageTask extends ParentTask
{
    public function __construct(
        protected readonly ChatMessageRepository $repository,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(int $messageId, string $userId): int
    {
        try {
            return $this->repository
                ->where('id', $messageId)
                ->where('sender_id', $userId)
                ->delete()
            ;
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
