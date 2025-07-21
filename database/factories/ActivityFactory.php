<?php

namespace Database\Factories;

use App\Models\ActivityType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activity>
 */
class ActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'activity_type_id' => ActivityType::inRandomOrder()->first()->id,
            'description' => fake()->paragraph(),
            'short_description' => fake()->sentence(),
            'activity_dates' => [
                [
                    'start' => fake()->dateTimeBetween('-1 year', '+1 year')->format('Y-m-d H:i:s'),
                    'end' => fake()->dateTimeBetween('-1 year', '+1 year')->format('Y-m-d H:i:s'),
                ]
            ],
            'location' => [
                [
                    'latitude' => fake()->latitude(),
                    'longitude' => fake()->longitude(),
                ]
            ],
            'registration_link' => fake()->url(),
        ];
    }

    /**
     * Add media to the activity.
     *
     * @return $this
     */
    public function withMedia(): self
    {
        return $this->afterCreating(function ($activity) {
            $activity->addMedia(storage_path('app/public/sample.jpg'))
                ->preservingOriginal()
                ->toMediaCollection('media_files');
            $activity->addMedia(storage_path('app/public/sample.mp4'))
                ->preservingOriginal()
                ->toMediaCollection('media_files');
        });
    }
}