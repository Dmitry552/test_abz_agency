<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phone' => '+380' . fake()->unique()->numberBetween(11111111, 99999999),
            'position_id' => fake()->numberBetween(1, 4),
            'photo' => 'images/' . fake()->file(
                public_path('/images'),
                storage_path('/app/public/images'),
                false
                )

        ];
    }
}
