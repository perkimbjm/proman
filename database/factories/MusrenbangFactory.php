<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\District;
use App\Models\Musrenbang;

class MusrenbangFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Musrenbang::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'year' => $this->faker->numberBetween(-10000, 10000),
            'status' => $this->faker->word(),
            'district_id' => District::factory(),
        ];
    }
}
