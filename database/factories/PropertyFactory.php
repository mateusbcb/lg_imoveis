<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
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
        $instalacoes = [
            'Características gerais' => [
                'Quartos',
                'Cozinha',
                'Sala',
                'Banheiro',
                'Garagem',
                'Área de serviço',
                'Mobiliado',
                'Sacada',
                'Lavanderia',
                'Lareira',
                'Elevador Social',
                'Elevador de Serviço',
            ],
            'Lazer' => [
                'Piscina',
                'Sala de Jogos',
                'Sauna',
                'Jardim',
            ],
            'Instalações' => [
                'Churrasqueira',
                'Armário de cozinha',
                'Interfone',
                'Piso de madeira',
                'Piso frio',
                'Portão eletrônico',
                'Armário embutido',
            ],
            'Diversas' => [
                'Hall de Serviços',
                'WC para empregados',
            ],
        ];

        $images = [
            'https://api.lorem.space/image/house?w=800&h=600&hash=8B7BCDC2',
            'https://api.lorem.space/image/furniture?w=800&h=600&hash=500B67FB',
            'https://api.lorem.space/image/furniture?w=800&h=600&hash=A89D0DE6',
            'https://api.lorem.space/image/furniture?w=800&h=600&hash=225E6693',
            'https://api.lorem.space/image/furniture?w=800&h=600&hash=BDC01094',
        ];

        return [
            'name' => $this->faker->sentence(3, true),
            'price' => $this->faker->randomFloat(2, 600, 1000000),
            'condominium' => $this->faker->randomFloat(2, 50, 10000),
            'city_id' => $this->faker->numberBetween(1, 10),
            'category_id' => $this->faker->numberBetween(1, 6),
            'business_id' => $this->faker->numberBetween(1, 3),
            'area' => $this->faker->randomFloat(2, 20, 2000),
            'building_area' => $this->faker->randomFloat(2, 20, 2000),
            'district' => $this->faker->citySuffix(),
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'garages' => $this->faker->numberBetween(0, 2),
            'details' => $this->faker->text(200),
            'installations' => json_encode($instalacoes),
            'images' => json_encode($images),
        ];
    }
}
