<?php

namespace Database\Seeders;

use App\Models\Testimoni;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TestimoniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Testimoni::factory(4)->create();
    }
}
