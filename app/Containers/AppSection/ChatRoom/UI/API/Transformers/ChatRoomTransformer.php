<?php

namespace App\Containers\AppSection\ChatRoom\UI\API\Transformers;

use App\Containers\AppSection\ChatRoom\Models\ChatRoom;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ChatRoomTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(ChatRoom $chatroom): array
    {
        return [
            'object' => $chatroom->getResourceKey(),
            'id' => $chatroom->id,
            'name' => $chatroom->name,
            'owner_id' => $chatroom->owner_id,
            'member_countt' => $chatroom->user_count,
            'created_at' => $chatroom->created_at,
        ];
    }
}
