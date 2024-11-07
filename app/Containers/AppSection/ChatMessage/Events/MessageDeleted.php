<?php

namespace App\Containers\AppSection\ChatMessage\Events;

use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageDeleted extends ParentEvent implements ShouldBroadcast
{
    public function __construct(
        public string $chatRoomId,
        public int $chatId,
    ) {
    }

    /**
     * @return Channel[]
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chat-room.'. $this->chatRoomId .'.messageDeleted'),
        ];
    }
}
