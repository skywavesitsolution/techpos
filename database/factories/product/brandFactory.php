<?php

namespace Database\Factories\product;

use App\Models\product\brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class brandFactory extends Factory
{
    protected $model = brand::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'metadata' => $this->faker->word(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
