<?php

namespace App\Containers\AppSection\ChatMessage\Actions;

use Apiato\Core\Exceptions\IncorrectIdException;
use App\Containers\AppSection\ChatMessage\Events\MessageSend;
use App\Containers\AppSection\ChatMessage\Models\ChatMessage;
use App\Containers\AppSection\ChatMessage\Tasks\CreateChatMessageTask;
use App\Containers\AppSection\ChatMessage\Tasks\FindChatMessageByIdTask;
use App\Containers\AppSection\ChatMessage\UI\API\Requests\CreateChatMessageRequest;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Actions\Action as ParentAction;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class CreateChatMessageAction extends ParentAction
{
    public function __construct(
        private readonly CreateChatMessageTask $createChatMessageTask,
        private readonly FindChatMessageByIdTask $findChatMessageByIdTask,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     * @throws IncorrectIdException
     */
    public function run(CreateChatMessageRequest $request): ChatMessage
    {
        $data = $request->sanitizeInput([
            'text',
            'attachment' => null,
            'reply' => null,
        ]);

        if ($data['attachment']) {
            $data['attachment'] = $this->fileHandler($data['attachment']);
        }

        if ($data['reply']) {
            $chatMessage = $this->findChatMessageByIdTask->run($data['reply']);
            $data['reply'] = [
                'message_id' => $chatMessage->id,
                'user_name' => $chatMessage->user->name,
                'message' => $chatMessage->content['text'],
            ];
        }

        $chatInput = [
            'sender_id' => $request->user()->id,
            'chat_room_id' => $request->chat_room_id,
            'content' => $data,
        ];
        $chatMessage = $this->createChatMessageTask->run($chatInput)->load('user');
        MessageSend::dispatch($chatMessage);

        return $chatMessage;
    }

    private function fileHandler(UploadedFile $file): string
    {
        $mimeType = $file->getMimeType();

        if (str_starts_with($mimeType, 'image/')) {
            return Storage::disk('public')->put('content/image', $file);
        } else {
            return Storage::disk('public')->put('content/video', $file);
        }
    }
}
