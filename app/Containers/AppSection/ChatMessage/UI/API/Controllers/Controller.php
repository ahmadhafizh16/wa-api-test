<?php

namespace App\Containers\AppSection\ChatMessage\UI\API\Controllers;

use Apiato\Core\Exceptions\CoreInternalErrorException;
use Apiato\Core\Exceptions\IncorrectIdException;
use Apiato\Core\Exceptions\InvalidTransformerException;
use App\Containers\AppSection\ChatMessage\Actions\CreateChatMessageAction;
use App\Containers\AppSection\ChatMessage\Actions\DeleteChatMessageAction;
use App\Containers\AppSection\ChatMessage\Actions\FindChatMessageByIdAction;
use App\Containers\AppSection\ChatMessage\Actions\ListChatMessagesAction;
use App\Containers\AppSection\ChatMessage\Actions\UpdateChatMessageAction;
use App\Containers\AppSection\ChatMessage\UI\API\Requests\CreateChatMessageRequest;
use App\Containers\AppSection\ChatMessage\UI\API\Requests\DeleteChatMessageRequest;
use App\Containers\AppSection\ChatMessage\UI\API\Requests\FindChatMessageByIdRequest;
use App\Containers\AppSection\ChatMessage\UI\API\Requests\ListChatMessagesRequest;
use App\Containers\AppSection\ChatMessage\UI\API\Requests\UpdateChatMessageRequest;
use App\Containers\AppSection\ChatMessage\UI\API\Transformers\ChatMessageTransformer;
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
        private readonly CreateChatMessageAction $createChatMessageAction,
        private readonly UpdateChatMessageAction $updateChatMessageAction,
        private readonly FindChatMessageByIdAction $findChatMessageByIdAction,
        private readonly ListChatMessagesAction $listChatMessagesAction,
        private readonly DeleteChatMessageAction $deleteChatMessageAction,
    ) {
    }

    /**
     * @throws InvalidTransformerException
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function sendMessage(CreateChatMessageRequest $request): JsonResponse
    {
        $chatmessage = $this->createChatMessageAction->run($request);

        return $this->created($this->transform($chatmessage, ChatMessageTransformer::class));
    }

    /**
     * @throws InvalidTransformerException
     * @throws NotFoundException
     */
    public function findChatMessageById(FindChatMessageByIdRequest $request): array
    {
        $chatmessage = $this->findChatMessageByIdAction->run($request);

        return $this->transform($chatmessage, ChatMessageTransformer::class);
    }

    /**
     * @throws InvalidTransformerException
     * @throws CoreInternalErrorException
     * @throws RepositoryException
     */
    public function listChatMessages(ListChatMessagesRequest $request): array
    {
        $chatmessages = $this->listChatMessagesAction->run($request);

        return $this->transform($chatmessages, ChatMessageTransformer::class);
    }

    /**
     * @throws IncorrectIdException
     * @throws InvalidTransformerException
     * @throws NotFoundException
     * @throws UpdateResourceFailedException
     */
    public function updateChatMessage(UpdateChatMessageRequest $request): array
    {
        $chatmessage = $this->updateChatMessageAction->run($request);

        return $this->transform($chatmessage, ChatMessageTransformer::class);
    }

    /**
     * @throws DeleteResourceFailedException
     * @throws NotFoundException
     */
    public function deleteChatMessage(DeleteChatMessageRequest $request): JsonResponse
    {
        $this->deleteChatMessageAction->run($request);

        return $this->noContent();
    }
}
