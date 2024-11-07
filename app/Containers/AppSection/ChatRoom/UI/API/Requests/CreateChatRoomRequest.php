<?php

namespace App\Containers\AppSection\ChatRoom\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateChatRoomRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    protected array $decode = [
        // 'id',
    ];

    protected array $urlParameters = [
        // 'id',
    ];

    public function rules(): array
    {
        return [
            'name' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
