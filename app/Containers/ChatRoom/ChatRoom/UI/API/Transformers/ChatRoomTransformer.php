<?php

namespace App\Containers\ChatRoom\ChatRoom\UI\API\Transformers;

use App\Containers\ChatRoom\ChatRoom\Models\ChatRoom;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ChatRoomTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(ChatRoom $chatroom): array
    {
        $response = [
            'object' => $chatroom->getResourceKey(),
            'id' => $chatroom->getHashedKey(),
        ];

        return $this->ifAdmin([
            'real_id' => $chatroom->id,
            'created_at' => $chatroom->created_at,
            'updated_at' => $chatroom->updated_at,
            'readable_created_at' => $chatroom->created_at->diffForHumans(),
            'readable_updated_at' => $chatroom->updated_at->diffForHumans(),
            // 'deleted_at' => $chatroom->deleted_at,
        ], $response);
    }
}
