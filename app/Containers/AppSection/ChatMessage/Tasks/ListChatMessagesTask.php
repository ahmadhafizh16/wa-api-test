<?php

namespace App\Containers\AppSection\ChatMessage\Tasks;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ChatMessage\Data\Repositories\ChatMessageRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Prettus\Repository\Exceptions\RepositoryException;

class ListChatMessagesTask extends ParentTask
{
    public function __construct(
        protected readonly ChatMessageRepository $repository,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(string $chatRoomId): mixed
    {
        $limit = request('limit', 10);

        return $this->repository
            ->where('chat_room_id', $chatRoomId)
            ->orderBy('created_at','DESC')
            ->paginate($limit)
        ;
    }
}
