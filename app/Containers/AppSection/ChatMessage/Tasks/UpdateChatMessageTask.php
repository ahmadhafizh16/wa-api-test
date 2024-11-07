<?php

namespace App\Containers\AppSection\ChatMessage\Tasks;

use App\Containers\AppSection\ChatMessage\Data\Repositories\ChatMessageRepository;
use App\Containers\AppSection\ChatMessage\Models\ChatMessage;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UpdateChatMessageTask extends ParentTask
{
    public function __construct(
        protected readonly ChatMessageRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function run(array $data, $id): ChatMessage
    {
        try {
            return $this->repository->update($data, $id);
        } catch (ModelNotFoundException) {
            throw new NotFoundException();
        } catch (\Exception) {
            throw new UpdateResourceFailedException();
        }
    }
}
