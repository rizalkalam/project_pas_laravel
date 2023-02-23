<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Order;
use App\Models\Testimoni;
use App\Models\Transaksi;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PromoSeeder;
use Database\Seeders\BarangSeeder;
use Database\Seeders\PreviewSeeder;
use Database\Seeders\KategoriSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // Testimoni::factory(4)->create();
        // User::factory(5)->create();
        Testimoni::factory(5)->create();
        // Transaksi::factory(5)->create();
        // Order::factory(5)->create();
        $this->call([
            BarangSeeder::class,
            KategoriSeeder::class,
            PreviewSeeder::class,
            PromoSeeder::class,
            RoleSeeder::class,
            UserSeeder::class
        ]);
    }
}

