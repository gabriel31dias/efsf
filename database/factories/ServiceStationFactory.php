<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ServiceStation;

class ServiceStationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServiceStation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_station_name' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'acronym_post' => $this->faker->regexify('[A-Za-z0-9]{15}'),
            'type_of_post' => $this->faker->numberBetween(-10000, 10000),
            'status' => $this->faker->boolean,
            'cep' => $this->faker->regexify('[A-Za-z0-9]{30}'),
            'type_of_street' => $this->faker->numberBetween(-10000, 10000),
            'address' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'number' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'complement' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'district' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'uf' => $this->faker->regexify('[A-Za-z0-9]{30}'),
        ];
    }
}
