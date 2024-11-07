<?php

namespace App\Containers\AppSection\ChatRoom\Actions;

use App\Containers\AppSection\ChatRoom\Models\Subscription;
use App\Containers\AppSection\ChatRoom\Tasks\CreateSubscriptionTask;
use App\Containers\AppSection\ChatRoom\Tasks\FindSubscriptionTask;
use App\Containers\AppSection\ChatRoom\UI\API\Requests\JoinChatRoomRequest;
use App\Ship\Exceptions\AccessDeniedException;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;

class JoinChatRoomAction extends ParentAction
{
    public function __construct(
        private readonly CreateSubscriptionTask $createSubscriptionTask,
        private readonly FindSubscriptionTask $findSubscriptionTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(JoinChatRoomRequest $request): Subscription
    {
        $user = $request->user();
        $data = $request->sanitizeInput([
            'chat_room_id',
            'user_id' => $user->id,
        ]);

        $subscription = $this->findSubscriptionTask->run($data);

        if ($subscription) {
            throw new AccessDeniedException('Chat room already joined');
        }

        return $this->createSubscriptionTask->run($data);
    }
}
