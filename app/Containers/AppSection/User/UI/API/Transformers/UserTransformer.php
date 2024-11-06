<?php

namespace App\Containers\AppSection\User\UI\API\Transformers;

use App\Containers\AppSection\User\Models\User;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class UserTransformer extends ParentTransformer
{
    protected array $availableIncludes = [
    ];

    protected array $defaultIncludes = [];

    public function transform(User $user): array
    {
        return [
            'object' => $user->getResourceKey(),
            'id' => $user->getHashedKey(),
            'name' => $user->name,
            'email' => $user->email,
            'gender' => $user->gender,
            'birth' => $user->birth,
        ];
    }
}
