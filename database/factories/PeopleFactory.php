<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PeopleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    public function definition()
    {
        return [
            //
            'peopleID' => $this->faker->unique()->numerify('##########'),
            'name' => $this->faker->name,
            'age' => $this->faker->numberBetween(2,6),
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->text($maxNbChars = 100),
            'date of birth' => $this->faker->dateTime()->format('Y-m-d'),
            'phone number' =>'08' . $this->faker->unique()->numerify('##########'),

        ];
    }
}
