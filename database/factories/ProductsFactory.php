<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'productName' => $this->faker->word,
            'productPrice' => $this->faker->numberBetween(1000, 10000),
            'productDescription' => $this->faker->paragraph,
            'productImage' => $this->faker->imageUrl(640, 480),
            'id_Category' => $this->faker->numberBetween(1, 10),
        ];
    }
}
