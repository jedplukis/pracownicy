<?php

namespace App\Modules\Workers\Repositories;

use App\Modules\Workers\Models\Worker;
use Illuminate\Database\Eloquent\Collection;

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
        return $this->worker::all();
    }
}
