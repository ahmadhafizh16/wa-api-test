<?php

namespace App\Containers\AppSection\ChatRoom\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class FindChatRoomByIdRequest extends ParentRequest
{
    protected array $access = [
        'permissions' => '',
        'roles' => '',
    ];

    protected array $decode = [
    ];

    protected array $urlParameters = [
        'id',
    ];

    public function rules(): array
    {
        return [
            // 'id' => 'required',
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
