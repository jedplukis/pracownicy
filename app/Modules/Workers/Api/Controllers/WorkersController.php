<?php

namespace App\Modules\Workers\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Workers\Exceptions\NotFoundException;
use App\Modules\Workers\Repositories\WorkerRepository;
use App\Modules\Workers\Requests\WorkerUpdateRequest;
use App\Modules\Workers\Requests\WorkerCreateRequest;
use App\DataTables\WorkersDataTable;
use App\Modules\Workers\Resources\WorkerResource;
use Exception;
use Illuminate\Http\JsonResponse;
use Yajra\DataTables\DataTables;

class WorkersController extends Controller implements WorkersControllerInterface
{
    public function __construct(protected WorkerRepository $workerRepository)
    {
    }

    /**
     * @param WorkersDataTable $dataTable
     * @return JsonResponse|mixed
     */
    public function index(WorkersDataTable $dataTable): mixed
    {
        if (request()->ajax()) {
            try {
                return DataTables::of($this->workerRepository->getAll())
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        return view('buttons.action', ['workerId' => $row->id]);
                    })
                    ->rawColumns(['action'])
                    ->make();
            } catch (Exception $e) {
                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

        return $dataTable->render('pracownicy.index');
    }

    /**
     * @param WorkerCreateRequest $workerCreateRequest
     * @return WorkerResource
     */
    public function store(WorkerCreateRequest $workerCreateRequest): WorkerResource
    {
        return WorkerResource::make($this->workerRepository->create($workerCreateRequest->validated()));
    }

    /**
     * @param int $workerId
     * @return WorkerResource
     * @throws NotFoundException
     */
    public function show(int $workerId): WorkerResource
    {
        return WorkerResource::make($this->workerRepository->find($workerId));
    }

    /**
     * @param WorkerUpdateRequest $workerUpdateRequest
     * @param int $workerId
     * @return WorkerResource
     * @throws NotFoundException
     */
    public function update(WorkerUpdateRequest $workerUpdateRequest, int $workerId): WorkerResource
    {
        return WorkerResource::make($this->workerRepository->update($workerId, $workerUpdateRequest->validated()));
    }

    /**
     * @param int $workerId
     * @return JsonResponse
     * @throws NotFoundException
     */
    public function destroy(int $workerId): JsonResponse
    {
        return response()->json(['deleted' => $this->workerRepository->delete($workerId)]);
    }
}
