<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Participant>
 */
class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'url' => $this->faker->url(),
            'location' => [
                [
                    'latitude' => fake()->latitude(),
                    'longitude' => fake()->longitude(),
                ]
            ],
        ];
    }

    public function withMedia(): self
    {
        return $this->afterCreating(function ($activity) {
            $activity->addMedia(storage_path('app/public/sample.jpg'))
                ->preservingOriginal()
                ->toMediaCollection('logo');
        });
    }
}
