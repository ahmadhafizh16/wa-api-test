<?php

namespace App\Containers\AppSection\ChatRoom\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ChatRoom\Data\Repositories\ChatRoomRepository;
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
    public function run(array $ids = [], string $mode = 'in'): mixed
    {
        $repo = $this->repository;
        $limit = request('limit', 10);

        if (!empty($ids)) {
            if ($mode = 'in') {
                $repo = $repo->whereIn('id', $ids);
            } else {
                $repo = $repo->whereNotIn('id', $ids);
            }
        }

        return $repo->paginate($limit);
    }
}
