<?php

namespace App\Containers\AppSection\ChatMessage\Events;

use App\Containers\AppSection\ChatMessage\UI\API\Transformers\ChatMessageTransformer;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSend extends ParentEvent implements ShouldBroadcast
{
    public string $chatRoomId;
    public function __construct(
        public $chatmessage,
    ) {
        $this->chatRoomId = $chatmessage->chat_room_id;
        $this->chatmessage = (new ChatMessageTransformer())->transform($chatmessage);
    }

    /**
     * @return Channel[]
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chat-room.'. $this->chatRoomId),
        ];
    }
}
