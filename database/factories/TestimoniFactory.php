<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;



/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimoni>
 */
class TestimoniFactory extends Factory
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
            'komentar'=>fake()->sentence(mt_rand(3,5)),
        ];
    }
}
