<?php

namespace App\Containers\ChatRoom\ChatRoom\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ChatRoomRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
