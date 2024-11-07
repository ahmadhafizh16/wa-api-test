<?php

namespace App\Containers\AppSection\ChatRoom\Actions;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use App\Containers\AppSection\ChatRoom\Tasks\GetAllSubscriptionTask;
use App\Containers\AppSection\ChatRoom\Tasks\ListChatRoomsTask;
use App\Containers\AppSection\ChatRoom\UI\API\Requests\ListUnsubscribedChatRoomsRequest;
use App\Ship\Parents\Actions\Action as ParentAction;
use Prettus\Repository\Exceptions\RepositoryException;

class ListUnsubscribedChatRoomsAction extends ParentAction
{
    public function __construct(
        private readonly ListChatRoomsTask $listChatRoomsTask,
        private readonly GetAllSubscriptionTask $getAllSubscriptionTask,
    ) {
    }

    /**
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function run(ListUnsubscribedChatRoomsRequest $request): mixed
    {
        $subscribedIds = $this->getAllSubscriptionTask->run($request->user()->id)->pluck('chat_room_id')->toArray();

        return $this->listChatRoomsTask->run(ids: $subscribedIds, mode: "notIn");
    }
}
