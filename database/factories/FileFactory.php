<?php

namespace Database\Factories;

use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;

class FileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'upload_name' => $this->faker->name,
            'mime_type' => $this->faker->mimeType,
            'size' => 20,
            'path' => $this->faker->imageUrl(),
        ];
    }
}
