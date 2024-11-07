<?php

namespace App\Containers\AppSection\ChatRoom\Models;

use App\Ship\Parents\Models\Model as ParentModel;
use Illuminate\Support\Str;

class ChatRoom extends ParentModel
{
    /**
     * A resource key to be used in the serialized responses.
     */
    protected string $resourceKey = 'ChatRoom';

    protected $fillable = [
        'name',
        'owner_id',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = Str::uuid()->toString();
            }
        });
    }

   /**
     * Get the value indicating whether the IDs are incrementing.
     *
     * @return bool
     */
    public function getIncrementing()
    {
        return false;
    }

   /**
     * Get the auto-incrementing key type.
     *
     * @return string
     */
    public function getKeyType()
    {
        return 'string';
    }

    public function subscriptions() {
        return $this->hasMany(Subscription::class, 'chat_room_id');
    }
}
