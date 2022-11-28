<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_pengguna'=>mt_rand(1,5),
            'id_barang'=>mt_rand(1,5),
            'jumlah_barang'=>fake()->randomNumber(1,2),
            'metode_pembayaran'=>fake()->creditCardType()
        ];
    }
}
