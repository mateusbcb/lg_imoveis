<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    public function withFaker()
    {
        return \Faker\Factory::create('pt_BR');
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categories = [
            'Casa',
            'Sobrado',
            'Terreno',
            'Apartamento',
            'Chácara',
            'Sitio'
        ];

        return [
            'name' => $this->faker->randomElement($categories)
        ];
    }
}
