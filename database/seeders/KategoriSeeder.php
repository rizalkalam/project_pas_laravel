<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'nama_kategori'=>'Sofa',
                'slug'=>'sofa',
            ],

            [
                'nama_kategori'=>'Meja',
                'slug'=>'meja',
            ],

            [
                'nama_kategori'=>'Kursi',
                'slug'=>'kursi',  
            ],
        ])->each(function ($kategori){
            DB::table('kategoris')->insert($kategori);
        });
    }
}
