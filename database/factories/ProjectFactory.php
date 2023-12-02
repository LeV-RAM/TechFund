<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\people;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $modelpeople = App\Models\people::class;
    public function definition()
    {
        $p = people::all();
         
        $i = 0;
 
        foreach($p as $peepl){
            $pplArray[$i] = $peepl->peopleID;
            $i++;
        }

        return [
            //
            'projectID' => $this->faker->unique()->numerify('##########'),
            'ownerID' => $this->faker->randomElement($pplArray),
            'projectname' => $this->faker->name,
            'fund' => $this->faker->randomFloat(2, 0, 1000000),
            'deadline' => $this->faker->dateTime()->format('Y-m-d'),
            'needworker' => $this->faker->boolean,
        ];
    }
}
