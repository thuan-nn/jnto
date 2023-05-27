<?php

namespace Database\Factories;

use App\Enums\CampaignRegisterType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
            'name' => $this->faker->name,
            'display_name' => $this->faker->name,
            'phone_number' => $this->faker->e164PhoneNumber,
            'email' => $this->faker->email,
            'campaign_register_type' => Arr::random(CampaignRegisterType::asArray()),
        ];
    }
}
