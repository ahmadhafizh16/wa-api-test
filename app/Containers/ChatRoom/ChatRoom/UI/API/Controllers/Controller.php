<?php

namespace App\Containers\ChatRoom\ChatRoom\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\ChatRoom\ChatRoom\Actions\CreateChatRoomAction;
use App\Containers\ChatRoom\ChatRoom\Actions\DeleteChatRoomAction;
use App\Containers\ChatRoom\ChatRoom\Actions\FindChatRoomByIdAction;
use App\Containers\ChatRoom\ChatRoom\Actions\ListChatRoomsAction;
use App\Containers\ChatRoom\ChatRoom\Actions\UpdateChatRoomAction;
use App\Containers\ChatRoom\ChatRoom\UI\API\Requests\CreateChatRoomRequest;
use App\Containers\ChatRoom\ChatRoom\UI\API\Requests\DeleteChatRoomRequest;
use App\Containers\ChatRoom\ChatRoom\UI\API\Requests\FindChatRoomByIdRequest;
use App\Containers\ChatRoom\ChatRoom\UI\API\Requests\ListChatRoomsRequest;
use App\Containers\ChatRoom\ChatRoom\UI\API\Requests\UpdateChatRoomRequest;
use App\Containers\ChatRoom\ChatRoom\UI\API\Transformers\ChatRoomTransformer;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
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
        private readonly FindChatRoomByIdAction $findChatRoomByIdAction,
        private readonly ListChatRoomsAction $listChatRoomsAction,
        private readonly DeleteChatRoomAction $deleteChatRoomAction,
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function createChatRoom(CreateChatRoomRequest $request): JsonResponse
    {
        $chatroom = $this->createChatRoomAction->run($request);

        return $this->created($this->transform($chatroom, ChatRoomTransformer::class));
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
    public function listChatRooms(ListChatRoomsRequest $request): array
    {
        $chatrooms = $this->listChatRoomsAction->run($request);

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

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteChatRoom(DeleteChatRoomRequest $request): JsonResponse
    {
        $this->deleteChatRoomAction->run($request);

        return $this->noContent();
    }
}
