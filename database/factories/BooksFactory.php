<?php

namespace Database\Factories;

use App\Models\Books;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Books>
 */
class BooksFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        return [
            'title' => $faker->words(2, true),
            'authors' => $faker->firstName . ' ' . $faker->lastName,
            'year' => $faker->year()
        ];
    }
}
