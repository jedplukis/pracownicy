<?php

namespace App\Modules\Workers\Repositories;

use App\Modules\Workers\Models\Worker;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\RecordsNotFoundException;
use Symfony\Component\CssSelector\Exception\InternalErrorException;

class WorkerRepository
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
     * @return bool
     */
    public function update(int $workerId, array $validated): bool
    {
        $this->worker->id = $workerId;

        $this->worker->update($validated);

        return $this->worker->id;
    }

    /**
     * @param int $workerId
     * @param array $validated
     * @return bool
     */
    public function delete(int $workerId): bool
    {
        $worker = $this->worker->findOrFail($workerId);

        return $worker->delete();
    }

    /**
     * @param int $workerId
     * @return Worker
     */
    public function findOrFail(int $workerId): Worker
    {
        return $this->worker->findOrFail($workerId);
    }
}
