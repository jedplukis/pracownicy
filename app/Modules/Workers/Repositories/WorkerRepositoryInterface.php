<?php

namespace App\Modules\Workers\Repositories;

use App\Modules\Workers\Exceptions\NotFoundException;
use App\Modules\Workers\Models\Worker;
use Illuminate\Database\Eloquent\Collection;

interface WorkerRepositoryInterface
{
    /**
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * @param array $validated
     * @return Worker
     */
    public function create(array $validated): Worker;

    /**
     * @param int $workerId
     * @param array $validated
     * @return Worker
     * @throws NotFoundException
     */
    public function update(int $workerId, array $validated): Worker;

    /**
     * @param int $workerId
     * @return bool
     * @throws NotFoundException
     */
    public function delete(int $workerId): bool;

    /**
     * @param int $workerId
     * @return ?Worker
     * @throws NotFoundException
     */
    public function find(int $workerId): ?Worker;
}
