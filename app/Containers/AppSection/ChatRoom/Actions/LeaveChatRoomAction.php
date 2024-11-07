<?php

namespace App\Containers\AppSection\ChatRoom\Actions;

use App\Containers\AppSection\ChatRoom\Events\LeaveChatRoomEvent;
use App\Containers\AppSection\ChatRoom\Tasks\DeleteSubscriptionTask;
use App\Containers\AppSection\ChatRoom\Tasks\FindChatRoomByIdTask;
use App\Containers\AppSection\ChatRoom\Tasks\FindSubscriptionTask;
use App\Containers\AppSection\ChatRoom\UI\API\Requests\LeaveChatRoomRequest;
use App\Ship\Exceptions\AccessDeniedException;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class LeaveChatRoomAction extends ParentAction
{
    public function __construct(
        private readonly DeleteSubscriptionTask $deleteSubscriptionTask,
        private readonly FindSubscriptionTask $findSubscriptionTask,
        private readonly FindChatRoomByIdTask $findChatRoomByIdTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(LeaveChatRoomRequest $request): int
    {
        $user = $request->user();
        $data = $request->sanitizeInput([
            'chat_room_id',
            'user_id' => $user->id,
        ]);

        $chatRoom = $this->findSubscriptionTask->run($data);

        if (!$chatRoom) {
            throw new AccessDeniedException('Already left the chat room');
        }

        $chatRoom = $this->findChatRoomByIdTask->run($data['chat_room_id']);
        if ($chatRoom->owner_id == $user->id) {
            throw new AccessDeniedException('Owner cant left the chat room');
        }

        $deleted = $this->deleteSubscriptionTask->run($data);
        LeaveChatRoomEvent::dispatch($user, $data['chat_room_id']);

        return $deleted;
    }
}
