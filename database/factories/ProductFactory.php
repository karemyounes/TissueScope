<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'CategoryId'        =>  2,
            'ProductName'       =>  $this->faker->name(),
            'Description'       =>  Str::random(50),
            'BuyingPrice'       =>  $this->faker->randomNumber(2,2,2000),
            'SellingPrice'      =>  $this->faker->randomNumber(2,2,2000),
            'Barcode'           =>  $this->faker->randomNumber(2,2,2000),
            'ProductImage'      =>  'Products/3Q1PswMOir68iug1u4fji7gOFZF1jKC7S8ApklW9.png',
        ];
    }
}
