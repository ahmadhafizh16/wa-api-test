<?php

namespace App\Containers\AppSection\ChatRoom\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ChatRoomRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
