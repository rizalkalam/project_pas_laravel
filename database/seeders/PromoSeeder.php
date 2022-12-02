<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PromoSeeder extends Seeder
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
                'judul_promo'=>'Promo Akhir Tahun, Diskon 20%',
                'nama_barang'=>'Sofa Medium Premium',
                'slug'=>'Sofa Medium Premium',
                'harga'=>'4.999',
                'diskon'=> '3.999',
                'deskripsi_barang'=>'ini adalah kursi yang sangat enak dan nyaman',
                'gambar_barang'=>'assets/sofa_medium.png',
                'gambar_detail_barang'=>'assets/sofa-medium.png',
                'kategori_id'=>1,
                'keterangan'=>'promo'
            ],
        ])->each(function ($promo){
            DB::table('promos')->insert($promo);
        });
    }
}
