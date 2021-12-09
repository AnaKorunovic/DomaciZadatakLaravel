<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Brand;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'brand_id'=>Brand::all()->random()->id,
            'user_id'=>User::all()->random()->id,
            
            'name'=>$this->faker->word(),
            'slug'=>$this->faker->slug(),
            'description'=>$this->faker->realText(70),
            'price'=>$this->faker->numerify('####'),
        ];
    }
}
