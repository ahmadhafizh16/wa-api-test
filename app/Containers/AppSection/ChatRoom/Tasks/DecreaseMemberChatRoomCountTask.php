<?php

namespace App\Containers\AppSection\ChatRoom\Tasks;

use App\Containers\AppSection\ChatRoom\Data\Repositories\ChatRoomRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DecreaseMemberChatRoomCountTask extends ParentTask
{
    public function __construct(
        protected readonly ChatRoomRepository $repository,
    ) {
    }

    public function run(string $id): mixed
    {
        return $this->repository->where('id', $id)->decrement('user_count');
    }
}