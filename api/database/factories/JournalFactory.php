<?php

namespace Database\Factories;

use App\Models\Catalog;
use App\Models\Journal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class JournalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<\Illuminate\Database\Eloquent\Model>
     */
    protected $model = Journal::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'catalog_id' => Catalog::factory(),
            'title' => fake()->title(),
            'author' => fake()->name(),
            'publisher' => fake()->name(),
            'issn' => fake()->unique()->isbn13(),
            'publish_date' => fake()->date(),
            'volume' => fake()->randomDigit(),
            'issue' => fake()->randomDigit(),
        ];
    }
}
