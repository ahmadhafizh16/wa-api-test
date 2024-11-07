<?php

namespace App\Containers\AppSection\ChatRoom\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ChatRoom\Models\ChatRoom;
use App\Containers\AppSection\ChatRoom\Tasks\CreateChatRoomTask;
use App\Containers\AppSection\ChatRoom\Tasks\CreateSubscriptionTask;
use App\Containers\AppSection\ChatRoom\UI\API\Requests\CreateChatRoomRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class CreateChatRoomAction extends ParentAction
{
    public function __construct(
        private readonly CreateChatRoomTask $createChatRoomTask,
        private readonly CreateSubscriptionTask $createSubscriptionTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateChatRoomRequest $request): ChatRoom
    {
        $user = $request->user();
        $data = $request->sanitizeInput([
            'name',
            'owner_id' => $user->id,
        ]);

        $chatRoom = $this->createChatRoomTask->run($data);

        $this->createSubscriptionTask->run([
            'user_id' => $user->id,
            'chat_room_id' => $chatRoom->id,
        ]);

        return $chatRoom;
    }
}
