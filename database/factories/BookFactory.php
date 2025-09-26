<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'            => $this->faker->sentence(3),
            'author'           => $this->faker->name(),
            'isbn'             => $this->faker->isbn13(),
            'description'      => $this->faker->paragraph(),
            'publisher'        => $this->faker->company(),
            'publication_date' => $this->faker->date(),
            'pages'            => $this->faker->numberBetween(100, 1000),
            'language'         => $this->faker->randomElement(['English', 'Indonesian']),
            'status'           => $this->faker->randomElement(['available', 'borrowed', 'maintenance']),
            'price'            => $this->faker->randomFloat(2, 10000, 500000),
            'created_by'       => User::factory(),
        ];
    }
}
