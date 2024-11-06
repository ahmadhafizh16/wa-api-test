<?php

namespace App\Containers\ChatRoom\ChatRoom\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\ChatRoom\ChatRoom\Tasks\ListChatRoomsTask;
use App\Containers\ChatRoom\ChatRoom\UI\API\Requests\ListChatRoomsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListChatRoomsAction extends ParentAction
{
    public function __construct(
        private readonly ListChatRoomsTask $listChatRoomsTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListChatRoomsRequest $request): mixed
    {
        return $this->listChatRoomsTask->run();
    }
}
