<?php

namespace App\Modules\Workers\Api\Controllers;

use App\DataTables\WorkersDataTable;
use App\Modules\Workers\Requests\WorkerCreateRequest;
use App\Modules\Workers\Requests\WorkerUpdateRequest;

interface WorkersControllerInterface
{
    public function index(WorkersDataTable $dataTable);

    public function store(WorkerCreateRequest $workerCreateRequest);

    public function show(int $workerId);

    public function update(WorkerUpdateRequest $workerUpdateRequest, int $workerId);

    public function destroy(int $workerId);
}
