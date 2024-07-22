<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    const GENRES = [
        'horror',
        'biography',
        'science fiction',
        'fantasy',
        'futuristic'
    ];

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'publisher' => fake()->company(),
            'author' => sprintf('%s %s',fake()->firstName, fake()->lastName),
            'genre' => self::GENRES[rand(0, count(self::GENRES) - 1)],
            'book_publication' => fake()->date,
            'amount_of_words' => fake()->randomNumber(4),
            'price' => fake()->randomNumber(3),
        ];
    }
}
