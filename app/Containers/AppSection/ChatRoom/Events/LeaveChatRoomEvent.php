<?php

namespace App\Containers\AppSection\ChatRoom\Events;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Events\Event as ParentEvent;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class LeaveChatRoomEvent extends ParentEvent implements ShouldBroadcast
{
    public function __construct(
        public User $user,
        public string $chatRoomId,
    ) {
    }

    /**
     * @return Channel[]
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('chat-room.'. $this->chatRoomId. 'leave'),
        ];
    }
}
