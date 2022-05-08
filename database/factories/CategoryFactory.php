<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $myCat = $this->faker->sentence(3);
        return [
            'name' => $myCat,
            'slug' => Str::slug($myCat),


            // 'name' => $this->faker->name(),
            // 'slug' => $this->faker->slug(),

            /* in here,
             'name' is categories table column name 
             'slug' is categories table column name 
             
             Str::slug use for create category slug according category name
             $myCat store face data

             faker->name() means laravel create fake name for you
             faker->email() means laravel create fake email for you
             faker->userName () means laravel create fake userName  for you 
             faker->password () means laravel create fake password  for you 
             faker->sentence(3) means laravel create fake sentence(3) for you 
             faker->emoji() means laravel create fake emoji() for you 
             etc.......

             */ 
        ];
    }
}
