<?php

namespace Database\Factories;

use App\Enums\Dieta;
use App\Enums\Firmy;
use App\Modules\Workers\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class WorkerFactory extends Factory
{
    protected $model = Worker::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $diety = Dieta::getAllValues();
        $firmy = Firmy::getAllValues();

        return [
            'email' => fake()->unique()->safeEmail(),
            'imie' => fake()->name(),
            'nazwisko' => fake()->name(),
            'telefon_1' => fake()->phoneNumber(),
            'telefon_2' => fake()->phoneNumber(),
            'dieta' => $diety[array_rand($diety)],
            'firma' => $firmy[array_rand($firmy)],
        ];
    }
}
