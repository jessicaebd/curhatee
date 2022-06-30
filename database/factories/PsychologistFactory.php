<?php

namespace Database\Factories;

use App\Models\Hospital;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PsychologistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'image' => 'psy-profile.jpg',
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password        
            'rating' => $this->faker->numberBetween(1, 5),
            'description' => $this->faker->paragraph,
            'hospital_id' => Hospital::all()->random()->i,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
