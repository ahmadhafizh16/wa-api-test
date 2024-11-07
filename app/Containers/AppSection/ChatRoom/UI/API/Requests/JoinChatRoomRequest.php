<?php

namespace App\Containers\AppSection\ChatRoom\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class JoinChatRoomRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    protected array $decode = [
    ];

    protected array $urlParameters = [
        'chat_room_id'
    ];

    public function rules(): array
    {
        return [
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
