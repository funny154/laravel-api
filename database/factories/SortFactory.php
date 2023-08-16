<?php

namespace Database\Factories;

use App\Models\Sort;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sort>
 */
class SortFactory extends Factory
{
    protected $model = Sort::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sort1' => $this->faker->randomNumber(3),
            'sort2' => $this->faker->randomNumber(3),
        ];
    }
}
