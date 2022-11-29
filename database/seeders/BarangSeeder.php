<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSeeder extends Seeder
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
                'nama_barang'=>'Sofa Panjang',
                'harga'=>'200000',
                'deskripsi_barang'=>'ini adalah kursi yang sangat enak dan nyaman',
                'gambar_barang'=>'assets/card-sofapanjang.png',
                'kategori_id'=>1
            ],

            [
                'nama_barang'=>'Sofa Special Grey',
                'harga'=>'200000',
                'deskripsi_barang'=>'ini adalah meja yang besar, kokoh, dan mewah',
                'gambar_barang'=>'assets/sofa-grey.png',
                'kategori_id'=>1
            ],

            [
                'nama_barang'=>'Kursi',
                'harga'=>'200000',
                'deskripsi_barang'=>'ini adalah kursi yang sangat enak dan nyaman',
                'gambar_barang'=>'assets/card-kursi.png',
                'kategori_id'=>3
            ],

            [
                'nama_barang'=>'Kursi Blue Ocean',
                'harga'=>'200000',
                'deskripsi_barang'=>'ini adalah meja yang besar, kokoh, dan mewah',
                'gambar_barang'=>'assets/kursibiru.png',
                'kategori_id'=>3
            ],

            [
                'nama_barang'=>'Kursi Rotan',
                'harga'=>'200000',
                'deskripsi_barang'=>'ini adalah sofa yang empuk, nyaman, serta mewah',
                'gambar_barang'=>'assets/kursi-rotan.png',
                'kategori_id'=>3
            ],

            [
                'nama_barang'=>'Kursi Goyang Kayu Jati',
                'harga'=>'200000',
                'deskripsi_barang'=>'ini adalah kasur yang lebar, luas, empuk, serta nyaman untuk tidur',
                'gambar_barang'=>'assets/kursi-goyang.png',
                'kategori_id'=>3
            ],
            [
                'nama_barang'=>'Meja Mini Lingkaran',
                'harga'=>'200000',
                'deskripsi_barang'=>'ini adalah lemari yang besar, kuat, kokoh, serta terlihat mewah',
                'gambar_barang'=>'assets/card-mejabundar.png',
                'kategori_id'=>2
            ],
            [
                'nama_barang'=>'Meja Segi Lima',
                'harga'=>'200000',
                'deskripsi_barang'=>'ini adalah lemari yang besar, kuat, kokoh, serta terlihat mewah',
                'gambar_barang'=>'assets/meja-segilima.png',
                'kategori_id'=>2
            ],
        ])->each(function ($barang){
            DB::table('barangs')->insert($barang);
        });
    }
}
