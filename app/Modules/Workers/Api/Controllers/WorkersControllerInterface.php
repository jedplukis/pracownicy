<?php

namespace App\Modules\Workers\Api\Controllers;

use Illuminate\Http\Request;

interface WorkersControllerInterface
{
    public function index(Request $request);

    public function create();

    public function show();

    public function edit();

    public function update();

    public function destroy();
}
