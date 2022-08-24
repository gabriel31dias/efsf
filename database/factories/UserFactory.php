<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cpf' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'name' => $this->faker->name,
            'zip_code' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'address' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'type_street' => $this->faker->numberBetween(-10000, 10000),
            'number' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'complement' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'district' => $this->faker->regexify('[A-Za-z0-9]{30}'),
            'uf' => $this->faker->regexify('[A-Za-z0-9]{5}'),
            'activate_date_time' => $this->faker->dateTime(),
            'status' => $this->faker->boolean,
            'cell' => $this->faker->regexify('[A-Za-z0-9]{15}'),
            'mail' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'user_name' => $this->faker->userName,
            'password' => $this->faker->password,
            'profile_id' => $this->faker->word,
        ];
    }
}
