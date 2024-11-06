<?php

namespace App\Containers\ChatRoom\ChatRoom\Actions;

use App\Containers\ChatRoom\ChatRoom\Models\ChatRoom;
use App\Containers\ChatRoom\ChatRoom\Tasks\FindChatRoomByIdTask;
use App\Containers\ChatRoom\ChatRoom\UI\API\Requests\FindChatRoomByIdRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action as ParentAction;

class FindChatRoomByIdAction extends ParentAction
{
    public function __construct(
        private readonly FindChatRoomByIdTask $findChatRoomByIdTask,
    ) {
    }

    /**
     * @throws NotFoundException
     */
    public function run(FindChatRoomByIdRequest $request): ChatRoom
    {
        return $this->findChatRoomByIdTask->run($request->id);
    }
}
