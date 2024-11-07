<?php

namespace App\Containers\AppSection\ChatRoom\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class SubscriptionRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        'owner_id' => '=',
        'chat_room_id' => '=',
    ];
}
