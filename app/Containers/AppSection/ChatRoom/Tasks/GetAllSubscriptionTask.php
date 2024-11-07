<?php

namespace App\Containers\AppSection\ChatRoom\Tasks;

use App\Containers\AppSection\ChatRoom\Data\Repositories\SubscriptionRepository;
use App\Ship\Parents\Tasks\Task as ParentTask;
use Illuminate\Database\Eloquent\Collection;

class GetAllSubscriptionTask extends ParentTask
{
    public function __construct(
        protected readonly SubscriptionRepository $repository,
    ) {
    }

    public function run(int $userId): Collection
    {
        return $this->repository
            ->where(['user_id' => $userId])
            ->get()
        ;
    }
}
