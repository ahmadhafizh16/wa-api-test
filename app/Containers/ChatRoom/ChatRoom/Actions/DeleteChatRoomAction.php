<?php

namespace App\Containers\ChatRoom\ChatRoom\Actions;

use App\Containers\ChatRoom\ChatRoom\Tasks\DeleteChatRoomTask;
use App\Containers\ChatRoom\ChatRoom\UI\API\Requests\DeleteChatRoomRequest;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class DeleteChatRoomAction extends ParentAction
{
    public function __construct(
        private readonly DeleteChatRoomTask $deleteChatRoomTask,
    ) {
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function run(DeleteChatRoomRequest $request): int
    {
        return $this->deleteChatRoomTask->run($request->id);
    }
}
