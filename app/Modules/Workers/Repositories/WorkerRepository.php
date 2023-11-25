<?php

namespace App\Modules\Workers\Repositories;

use App\Modules\Workers\Exceptions\NotFoundException;
use App\Modules\Workers\Models\Worker;
use Illuminate\Database\Eloquent\Collection;

class WorkerRepository implements WorkerRepositoryInterface
{
    public function __construct(protected Worker $worker)
    {
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->worker::all(['id', 'imie', 'nazwisko', 'email', 'firma', 'dieta', 'telefon_1', 'telefon_2']);
    }

    /**
     * @param array $validated
     * @return Worker
     */
    public function create(array $validated): Worker
    {
        return $this->worker->create($validated);
    }

    /**
     * @param int $workerId
     * @param array $validated
     * @return Worker
     * @throws NotFoundException
     */
    public function update(int $workerId, array $validated): Worker
    {
        $worker = $this->find($workerId);

        $worker->update($validated);

        return $this->find($workerId);
    }

    /**
     * @param int $workerId
     * @return bool
     * @throws NotFoundException
     */
    public function delete(int $workerId): bool
    {
        $worker = $this->find($workerId);

        return $worker->delete();
    }

    /**
     * @param int $workerId
     * @return ?Worker
     * @throws NotFoundException
     */
    public function find(int $workerId): ?Worker
    {
        $record = $this->worker->find($workerId);

        if ($record === null) {
            throw NotFoundException::message();
        }

        return $record;
    }
}
