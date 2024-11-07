<?php

namespace App\Containers\AppSection\ChatMessage\Data\Factories;

use App\Containers\AppSection\ChatMessage\Models\ChatMessage;
use App\Ship\Parents\Factories\Factory as ParentFactory;

/**
 * @template TModel of ChatMessageFactory
 *
 * @extends ParentFactory<TModel>
 */
class ChatMessageFactory extends ParentFactory
{
    /** @var class-string<TModel> */
    protected $model = ChatMessage::class;

    public function definition(): array
    {
        return [
            //
        ];
    }
}
