<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PreviewSeeder extends Seeder
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
                'gambar_barang'=>'assets/grid1.png',
            ],
            [
                'gambar_barang'=>'assets/grid2.png',
            ],
            [
                'gambar_barang'=>'assets/grid3.png',
            ],
            [
                'gambar_barang'=>'assets/grid4.png',
            ],
        ])->each(function ($preview){
            DB::table('previews')->insert($preview);});
    }
}
