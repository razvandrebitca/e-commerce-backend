<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
            return [
                "name" => $faker->word,
                "detail" => $faker->paragraph,
                "price" => $faker->numberBetween(100,1000),
                "stock" => $faker->randomDigit,
                "discount" => $faker->numberBetween(2,30),
                "user_id" => function(){
                    return \App\User::all()->random();
                }
            ];
   
    }
}
