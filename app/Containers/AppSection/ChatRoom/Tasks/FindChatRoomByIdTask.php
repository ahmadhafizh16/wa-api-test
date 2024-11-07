<?php

namespace App\Containers\AppSection\ChatRoom\Tasks;

use App\Containers\AppSection\ChatRoom\Data\Repositories\ChatRoomRepository;
use App\Containers\AppSection\ChatRoom\Models\ChatRoom;
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
    public function run(string $id, bool $lock = false): ChatRoom
    {
        try {
            $repo = $this->repository;
            if ($lock) {
                $repo->lockForUpdate();
            }   

            return $repo->find($id);
        } catch (\Exception) {
            throw new NotFoundException();
        }
    }
}
