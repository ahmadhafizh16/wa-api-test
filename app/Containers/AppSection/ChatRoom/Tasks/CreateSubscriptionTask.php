<?php

namespace App\Containers\AppSection\ChatRoom\Tasks;

use App\Containers\AppSection\ChatRoom\Data\Repositories\SubscriptionRepository;
use App\Containers\AppSection\ChatRoom\Models\Subscription;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class CreateSubscriptionTask extends ParentTask
{
    public function __construct(
        protected readonly SubscriptionRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): Subscription
    {
        try {
            return $this->repository->create($data);
        } catch (\Exception $e) {
            throw new CreateResourceFailedException($e->getMessage());
        }
    }
}
