<?php

namespace App\Containers\AppSection\ChatRoom\Data\Factories;

use App\Containers\AppSection\ChatRoom\Models\ChatRoom;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of ChatRoomFactory
 *
 * @extends ParentFactory<TModel>
 */
class ChatRoomFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = ChatRoom::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
