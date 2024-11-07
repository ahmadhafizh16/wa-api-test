<?php

namespace App\Containers\AppSection\ChatMessage\UI\API\Transformers;

use App\Containers\AppSection\ChatMessage\Models\ChatMessage;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ChatMessageTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(ChatMessage $chatmessage): array
    {
        return [
            'id' => $chatmessage->id,
            'chat_room_id' => $chatmessage->chat_room_id,
            'sender_id' => $chatmessage->sender_id,
            'sender_name' => $chatmessage->user->name,
            'content' => [
                'text' => $chatmessage->content['text'],
                'attachment' => $chatmessage->content['attachment'] ? asset('storage/'.$chatmessage->content['attachment']) : null,
                'reply' => $chatmessage->content['reply'],
            ],
            'created_at' => $chatmessage->created_at->format('Y-m-d H:i:s.u'),
        ];
    }
}
