<?php

namespace App\Containers\AppSection\ChatRoom\Models;

use App\Ship\Parents\Models\Model as ParentModel;

class Subscription extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'Subscription';

    protected $fillable = [
        'chat_room_id',
        'user_id',
    ];

    public function chatRoom() {
        return $this->belongsTo(ChatRoom::class, 'chat_room_id');
    }
}
