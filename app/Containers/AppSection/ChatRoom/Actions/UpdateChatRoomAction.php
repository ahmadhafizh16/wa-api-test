<?php

namespace App\Containers\AppSection\ChatRoom\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ChatRoom\Models\ChatRoom;
use App\Containers\AppSection\ChatRoom\Tasks\UpdateChatRoomTask;
use App\Containers\AppSection\ChatRoom\UI\API\Requests\UpdateChatRoomRequest;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class UpdateChatRoomAction extends ParentAction
{
    public function __construct(
        private readonly UpdateChatRoomTask $updateChatRoomTask,
    ) {
    }

    /**
     * @throws UpdateResourceFailedException
     * @throws IncorrectIdException
     * @throws NotFoundException
     */
    public function run(UpdateChatRoomRequest $request): ChatRoom
    {
        $data = $request->sanitizeInput([
            // add your request data here
        ]);

        return $this->updateChatRoomTask->run($data, $request->id);
    }
}
