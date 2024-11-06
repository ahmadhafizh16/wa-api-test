<?php

namespace App\Containers\ChatRoom\ChatRoom\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\ChatRoom\ChatRoom\Data\Repositories\ChatRoomRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListChatRoomsTask extends ParentTask
{
    public function __construct(
        protected readonly ChatRoomRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(): mixed
    {
        return $this->repository->addRequestCriteria()->paginate();
    }
}
