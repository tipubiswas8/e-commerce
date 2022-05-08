<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_i' => $this->faker->postcode(5),
            'product_n' => $this->faker->name(3),
            'product_p' => $this->faker->buildingNumber(4),
            'customer_n' => $this->faker->word(3),
            'customer_a' => $this->faker->address(3),
            'customer_p' => $this->faker->phoneNumber(10),
        ];
            

            /* in here,
            'product_i',
            'product_n',
            'product_p',
            'customer_n',
            'customer_a',
            'customer_p'
             is orders table column name 


             faker->postcode(3) means laravel create fake postcode(3) for you
             faker->name() means laravel create fake name for you
             faker->buildingNumber() means laravel create fake buildingNumber() for you
             faker->word() means laravel create fake word() for you 
             faker->address(3) means laravel create fake address(3)  for you 
             faker->phoneNumber(10) means laravel create fake phoneNumber(10) for you 
             etc.......

             */ 
       
    }
}
