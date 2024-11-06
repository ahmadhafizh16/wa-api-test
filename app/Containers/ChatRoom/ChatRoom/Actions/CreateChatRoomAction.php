<?php

namespace App\Containers\ChatRoom\ChatRoom\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\ChatRoom\ChatRoom\Models\ChatRoom;
use App\Containers\ChatRoom\ChatRoom\Tasks\CreateChatRoomTask;
use App\Containers\ChatRoom\ChatRoom\UI\API\Requests\CreateChatRoomRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateChatRoomAction extends ParentAction
{
    public function __construct(
        private readonly CreateChatRoomTask $createChatRoomTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateChatRoomRequest $request): ChatRoom
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->createChatRoomTask->run($data);
    }
}
