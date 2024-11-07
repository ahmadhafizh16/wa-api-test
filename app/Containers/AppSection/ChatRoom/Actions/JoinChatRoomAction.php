<?php

namespace App\Containers\AppSection\ChatRoom\Actions;

use App\Containers\AppSection\ChatRoom\Events\JoinChatRoomEvent;
use App\Containers\AppSection\ChatRoom\Models\Subscription;
use App\Containers\AppSection\ChatRoom\Tasks\CreateSubscriptionTask;
use App\Containers\AppSection\ChatRoom\Tasks\FindChatRoomByIdTask;
use App\Containers\AppSection\ChatRoom\Tasks\FindSubscriptionTask;
use App\Containers\AppSection\ChatRoom\Tasks\IncreaseMemberChatRoomCountTask;
use App\Containers\AppSection\ChatRoom\UI\API\Requests\JoinChatRoomRequest;
use App\Ship\Exceptions\AccessDeniedException;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class JoinChatRoomAction extends ParentAction
{
    public function __construct(
        private readonly CreateSubscriptionTask $createSubscriptionTask,
        private readonly FindSubscriptionTask $findSubscriptionTask,
        private readonly FindChatRoomByIdTask $findChatRoomByIdTask,
        private readonly IncreaseMemberChatRoomCountTask $increaseMemberChatRoomCountTask,
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

        // Prevent race conditions
        DB::transaction(function () use ($data) {
            $chatRoom = $this->findChatRoomByIdTask->run($data['chat_room_id'], true);

            if ($chatRoom->user_count >= 500) {
                throw new UnprocessableEntityHttpException('Chat room is already full');
            }
        });

        $chatSubs = $this->createSubscriptionTask->run($data);
        $this->increaseMemberChatRoomCountTask->run($data['chat_room_id']);

        JoinChatRoomEvent::dispatch($user, $data['chat_room_id']);

        return $chatSubs;
    }
}
