<?php

namespace App\Containers\AppSection\ChatRoom\Tasks;

use App\Containers\AppSection\ChatRoom\Data\Repositories\SubscriptionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task as ParentTask;

class DeleteSubscriptionTask extends ParentTask
{
    public function __construct(
        protected readonly SubscriptionRepository $repository,
    ) {
    }

    /**
     * @throws CreateResourceFailedException
     */
    public function run(array $data): int
    {
        try {
            return $this->repository->deleteWhere($data);
        } catch (\Exception $e) {
            throw new DeleteResourceFailedException($e->getMessage());
        }
    }
}
