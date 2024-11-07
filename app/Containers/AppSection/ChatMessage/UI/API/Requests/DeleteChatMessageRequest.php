<?php

namespace App\Containers\AppSection\ChatMessage\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class DeleteChatMessageRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    protected array $decode = [
    ];

    protected array $urlParameters = [
        'chat_room_id',
    ];

    public function rules(): array
    {
        return [
            'id' => 'required|numeric',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
