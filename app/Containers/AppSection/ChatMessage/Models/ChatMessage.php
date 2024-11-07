<?php

namespace App\Containers\AppSection\ChatMessage\Models;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class ChatMessage extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'ChatMessage';

    protected $fillable = [
        'sender_id',
        'content',
        'chat_room_id',
    ];

    protected $casts = [
        'content' => 'json',
    ];

    public function freshTimestamp()
    {
        return Carbon::now()->format('Y-m-d H:i:s.u'); // Microsecond precision
    }

    public function fromDateTime($value)
    {
        return $value instanceof \DateTime ? $value->format('Y-m-d H:i:s.u') : Carbon::parse($value)->format('Y-m-d H:i:s.u');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
