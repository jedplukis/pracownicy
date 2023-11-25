<?php

namespace Database\Seeders;

use Database\Factories\WorkerFactory;
use Illuminate\Database\Seeder;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factory = new WorkerFactory();
        $factory->count(50)->create();
    }
}
