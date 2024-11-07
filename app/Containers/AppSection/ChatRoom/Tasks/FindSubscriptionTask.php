<?php

namespace App\Containers\AppSection\ChatRoom\Tasks;

use App\Containers\AppSection\ChatRoom\Data\Repositories\SubscriptionRepository;
use App\Containers\AppSection\ChatRoom\Models\Subscription;
use App\Ship\Parents\Tasks\Task as ParentTask;

class FindSubscriptionTask extends ParentTask
{
    public function __construct(
        protected readonly SubscriptionRepository $repository,
    ) {
    }

    public function run(array $data): Subscription|null
    {
        return $this->repository->where($data)->first();
    }
}
