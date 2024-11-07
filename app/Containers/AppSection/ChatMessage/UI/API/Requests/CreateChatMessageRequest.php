<?php

namespace App\Containers\AppSection\ChatMessage\UI\API\Requests;

use App\Ship\Parents\Requests\Request as ParentRequest;

class CreateChatMessageRequest extends ParentRequest
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
            'text' => 'required',
            'attachment' => 'mimes:jpeg,png,jpg,gif,svg,mp4,avi,mkv,wmv',
            'reply' => 'numeric', // message id
        ];
    }

    public function authorize(): bool
    {
        return $this->check([
            'hasAccess',
        ]);
    }
}
