<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\people;
use App\Models\project;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class StakeholderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $modelpeople = App\Models\people::class;
    protected $modelproject = App\Models\project::class;
    public function definition()
    {
        $p = people::all();
        $pr = project::all();

        $i = 0;
        $j = 0;
 
        foreach($p as $peepl){
            $pplArray[$i] = $peepl->peopleID;
            $i++;
        }

        foreach($pr as $pro){
            $prArray[$j] = $pro->projectID;
            $j++;
        }
        
        return [
            //
            'projectID' => $this->faker->randomElement($prArray),
            'stakeholderID' => $this->faker->randomElement($pplArray),
            'amount' => $this->faker->randomFloat(2, 0, 1000000),
        ];
    }
}
