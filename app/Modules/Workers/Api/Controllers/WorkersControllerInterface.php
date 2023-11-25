<?php

namespace App\Modules\Workers\Api\Controllers;

use App\DataTables\WorkersDataTable;
use App\Modules\Workers\Exceptions\NotFoundException;
use App\Modules\Workers\Requests\WorkerCreateRequest;
use App\Modules\Workers\Requests\WorkerUpdateRequest;
use App\Modules\Workers\Resources\WorkerResource;
use Illuminate\Http\JsonResponse;

interface WorkersControllerInterface
{
    /**
     * @param WorkersDataTable $dataTable
     * @return mixed
     */
    public function index(WorkersDataTable $dataTable): mixed;

    /**
     * @param WorkerCreateRequest $workerCreateRequest
     * @return WorkerResource
     */
    public function store(WorkerCreateRequest $workerCreateRequest): WorkerResource;

    /**
     * @param int $workerId
     * @return WorkerResource
     * @throws NotFoundException
     */
    public function show(int $workerId): WorkerResource;

    /**
     * @param WorkerUpdateRequest $workerUpdateRequest
     * @param int $workerId
     * @return WorkerResource
     * @throws NotFoundException
     */
    public function update(WorkerUpdateRequest $workerUpdateRequest, int $workerId): WorkerResource;

    /**
     * @param int $workerId
     * @return JsonResponse
     * @throws NotFoundException
     */
    public function destroy(int $workerId): JsonResponse;
}
