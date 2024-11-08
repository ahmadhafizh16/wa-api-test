<?php

namespace App\Containers\AppSection\Authentication\UI\API\Transformers;

use App\Containers\AppSection\Authentication\Values\Token;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class TokenTransformer extends ParentTransformer
{
    public function transform(Token $token): array
    {
        return [
            'object' => $token->getResourceKey(),
            'token_type' => $token->tokenType,
            'access_token' => $token->accessToken,
            'expires_in' => $token->expiresIn,
        ];
    }
}
