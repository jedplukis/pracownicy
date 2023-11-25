<?php

namespace App\Modules\Workers\Api\Controllers;

use App\DataTables\WorkersDataTable;
use App\Modules\Workers\Exceptions\NotFoundException;
use App\Modules\Workers\Requests\WorkerCreateRequest;
use App\Modules\Workers\Requests\WorkerUpdateRequest;
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
     * @return JsonResponse
     */
    public function store(WorkerCreateRequest $workerCreateRequest): JsonResponse;

    /**
     * @param int $workerId
     * @return JsonResponse
     * @throws NotFoundException
     */
    public function show(int $workerId): JsonResponse;

    /**
     * @param WorkerUpdateRequest $workerUpdateRequest
     * @param int $workerId
     * @return JsonResponse
     * @throws NotFoundException
     */
    public function update(WorkerUpdateRequest $workerUpdateRequest, int $workerId): JsonResponse;

    /**
     * @param int $workerId
     * @return JsonResponse
     * @throws NotFoundException
     */
    public function destroy(int $workerId): JsonResponse;
}
