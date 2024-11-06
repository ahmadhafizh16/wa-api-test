<?php

namespace App\Containers\ChatRoom\ChatRoom\Tasks;

use App\Containers\ChatRoom\ChatRoom\Data\Repositories\ChatRoomRepository;
use App\Containers\ChatRoom\ChatRoom\Models\ChatRoom;
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
        } catch (\Exception) {
            throw new CreateResourceFailedException();
        }
    }
}
