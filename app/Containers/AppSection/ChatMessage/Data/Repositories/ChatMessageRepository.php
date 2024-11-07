<?php

namespace App\Containers\AppSection\ChatMessage\Data\Repositories;

use App\Ship\Parents\Repositories\Repository as ParentRepository;

class ChatMessageRepository extends ParentRepository
{
    protected $fieldSearchable = [
        'id' => '=',
        // ...
    ];
}
