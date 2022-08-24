<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Profile;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_profil' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'status' => $this->faker->boolean,
            'days_to_access_inspiration' => $this->faker->numberBetween(-10000, 10000),
            'days_to_activity_lock' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
