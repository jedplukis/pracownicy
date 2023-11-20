<?php

namespace App\Modules\Workers\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Workers\Repositories\WorkerRepository;
use App\Modules\Workers\Requests\WorkerUpdateRequest;
use App\Modules\Workers\Requests\WorkerCreateRequest;
use Exception;
use Illuminate\Http\Request;
use App\DataTables\WorkersDataTable;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\DataTables;

class WorkersController extends Controller implements WorkersControllerInterface
{
    public function __construct(protected WorkerRepository $workerRepository)
    {
    }

    public function index(WorkersDataTable $dataTable)
    {
        if (request()->ajax()) {
            return DataTables::of($this->workerRepository->getAll())
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn =
                        '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit-btn btn btn-primary btn-sm">Edit</a>
                         <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="delete-btn btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return $dataTable->render('pracownicy.index');
    }

    /**
     * @param WorkerCreateRequest $workerCreateRequest
     * @return array
     */
    public function store(WorkerCreateRequest $workerCreateRequest): array
    {
        return ['message' => 'success', 'record' => $this->workerRepository->create($workerCreateRequest->validated())];
    }

    public function show(int $workerId)
    {
        return ['message' => 'success', 'record' => $this->workerRepository->findOrFail($workerId)];
    }

    public function update(WorkerUpdateRequest $workerUpdateRequest, int $workerId)
    {
        dd($workerUpdateRequest);
        return ['message' => $this->workerRepository->update($workerId, $workerUpdateRequest->validated())];
    }

    public function destroy(int $workerId)
    {
        return ['message' => $this->workerRepository->delete($workerId) ? 'success': 'failure'];
    }
}
