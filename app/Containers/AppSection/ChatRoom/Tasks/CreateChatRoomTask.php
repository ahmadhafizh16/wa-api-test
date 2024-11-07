<?php

namespace App\Containers\AppSection\ChatRoom\Tasks;

use App\Containers\AppSection\ChatRoom\Data\Repositories\ChatRoomRepository;
use App\Containers\AppSection\ChatRoom\Models\ChatRoom;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateChatRoomTask extends ParentTask
{
    public function __construct(
        protected readonly ChatRoomRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): ChatRoom
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception $e) {
            throw new CreateResourceFailedException($e->getMessage());
        }
    }
}
