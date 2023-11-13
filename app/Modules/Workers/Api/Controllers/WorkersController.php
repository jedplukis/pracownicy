<?php

namespace App\Modules\Workers\Api\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Workers\Models\Worker;
use App\Modules\Workers\Repositories\WorkerRepository;
use Illuminate\Http\Request;

class WorkersController extends Controller implements WorkersControllerInterface
{
    public function __construct(protected WorkerRepository $workerRepository)
    {
    }

    public function index(Request $request)
    {
        $workers = $this->workerRepository->getAll();

        return view('pracownicy.index', ['pracownicy' => $workers]);
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}
