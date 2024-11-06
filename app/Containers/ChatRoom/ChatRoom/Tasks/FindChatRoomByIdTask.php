<?php

namespace App\Containers\ChatRoom\ChatRoom\Tasks;

use App\Containers\ChatRoom\ChatRoom\Data\Repositories\ChatRoomRepository;
use App\Containers\ChatRoom\ChatRoom\Models\ChatRoom;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindChatRoomByIdTask extends ParentTask
{
    public function __construct(
        protected readonly ChatRoomRepository $repository,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run($id): ChatRoom
    {
        try {
            return $this->repository->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
