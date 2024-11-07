<?php

namespace App\Containers\AppSection\ChatRoom\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ChatRoom\Actions\CreateChatRoomAction;
use App\Containers\AppSection\ChatRoom\Actions\DeleteChatRoomAction;
use App\Containers\AppSection\ChatRoom\Actions\FindChatRoomByIdAction;
use App\Containers\AppSection\ChatRoom\Actions\JoinChatRoomAction;
use App\Containers\AppSection\ChatRoom\Actions\LeaveChatRoomAction;
use App\Containers\AppSection\ChatRoom\Actions\ListSubscribedChatRoomsAction;
use App\Containers\AppSection\ChatRoom\Actions\UpdateChatRoomAction;
use App\Containers\AppSection\ChatRoom\UI\API\Requests\CreateChatRoomRequest;
use App\Containers\AppSection\ChatRoom\UI\API\Requests\FindChatRoomByIdRequest;
use App\Containers\AppSection\ChatRoom\UI\API\Requests\JoinChatRoomRequest;
use App\Containers\AppSection\ChatRoom\UI\API\Requests\LeaveChatRoomRequest;
use App\Containers\AppSection\ChatRoom\UI\API\Requests\ListSubscribedChatRoomsRequest;
use App\Containers\AppSection\ChatRoom\UI\API\Requests\UpdateChatRoomRequest;
use App\Containers\AppSection\ChatRoom\UI\API\Transformers\ChatRoomTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Prettus\Repository\Exceptions\RepositoryException;

class Controller extends ApiController
{
    public function __construct(
        private readonly CreateChatRoomAction $createChatRoomAction,
        private readonly UpdateChatRoomAction $updateChatRoomAction,
        private readonly JoinChatRoomAction $joinChatRoomAction,
        private readonly LeaveChatRoomAction $leaveChatRoomAction,
        private readonly FindChatRoomByIdAction $findChatRoomByIdAction,
        private readonly ListSubscribedChatRoomsAction $listSubscribedChatRoomsAction,
        private readonly DeleteChatRoomAction $deleteChatRoomAction,
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     */
    public function createChatRoom(CreateChatRoomRequest $request): JsonResponse
    {
        $chatroom = $this->createChatRoomAction->run($request);

        return $this->created($this->transform($chatroom, ChatRoomTransformer::class));
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function joinChatRoom(JoinChatRoomRequest $request): JsonResponse
    {
        $this->joinChatRoomAction->run($request);

        return $this->created();
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function leaveChatRoom(LeaveChatRoomRequest $request): JsonResponse
    {
        $this->leaveChatRoomAction->run($request);

        return $this->noContent();
    }

    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findChatRoomById(FindChatRoomByIdRequest $request): array
    {
        $chatroom = $this->findChatRoomByIdAction->run($request);

        return $this->transform($chatroom, ChatRoomTransformer::class);
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function getAllSubscribedChatRooms(ListSubscribedChatRoomsRequest $request): array
    {
        $chatrooms = $this->listSubscribedChatRoomsAction->run($request);

        return $this->transform($chatrooms, ChatRoomTransformer::class);
    }

    /**
     * @throws IncorrectIdException
     * @throws InvalidTransformerException
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function updateChatRoom(UpdateChatRoomRequest $request): array
    {
        $chatroom = $this->updateChatRoomAction->run($request);

        return $this->transform($chatroom, ChatRoomTransformer::class);
    }
}
