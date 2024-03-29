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
                'slug'=>'Sofa Panjang',
                'harga'=>'2000',
                'deskripsi_barang'=>'ini adalah kursi yang sangat enak dan nyaman',
                'gambar_barang'=>'card-sofapanjang.png',
                'gambar_detail_barang'=>'detail-sofa-panjang.png',
                'kategori_id'=>1
            ],

            [
                'nama_barang'=>'Sofa Special Grey',
                'slug'=>'Sofa Special Grey',
                'harga'=>'2000',
                'deskripsi_barang'=>'ini adalah meja yang besar, kokoh, dan mewah',
                'gambar_barang'=>'sofa-grey.png',
                'gambar_detail_barang'=>'detail-sofa-special-grey.png',
                'kategori_id'=>1
            ],

            [
                'nama_barang'=>'Kursi',
                'slug'=>'Kursi',
                'harga'=>'2000',
                'deskripsi_barang'=>'ini adalah kursi yang sangat enak dan nyaman',
                'gambar_barang'=>'card-kursi.png',
                'gambar_detail_barang'=>'card-kursi.png',
                'kategori_id'=>3
            ],

            [
                'nama_barang'=>'Kursi Blue Ocean',
                'slug'=>'Kursi Blue Ocean',
                'harga'=>'3000',
                'deskripsi_barang'=>'ini adalah meja yang besar, kokoh, dan mewah',
                'gambar_barang'=>'kursibiru.png',
                'gambar_detail_barang'=>'kursibiru.png',
                'kategori_id'=>3
            ],

            [
                'nama_barang'=>'Kursi Rotan',
                'slug'=>'Kursi Rotan',
                'harga'=>'2000',
                'deskripsi_barang'=>'ini adalah sofa yang empuk, nyaman, serta mewah',
                'gambar_barang'=>'kursi-rotan.png',
                'gambar_detail_barang'=>'kursi-rotan.png',
                'kategori_id'=>3
            ],

            [
                'nama_barang'=>'Kursi Goyang Kayu Jati',
                'slug'=>'Kursi Goyang Kayu Jati',
                'harga'=>'2000',
                'deskripsi_barang'=>'ini adalah kasur yang lebar, luas, empuk, serta nyaman untuk tidur',
                'gambar_barang'=>'kursi-goyang.png',
                'gambar_detail_barang'=>'kursi-goyang.png',
                'kategori_id'=>3
            ],
            [
                'nama_barang'=>'Meja Mini Lingkaran',
                'slug'=>'Meja Mini Lingkaran',
                'harga'=>'2000',
                'deskripsi_barang'=>'ini adalah lemari yang besar, kuat, kokoh, serta terlihat mewah',
                'gambar_barang'=>'card-mejabundar.png',
                'gambar_detail_barang'=>'card-mejabundar.png',
                'kategori_id'=>2
            ],
            [
                'nama_barang'=>'Meja Segi Lima',
                'slug'=>'Meja Segi Lima',
                'harga'=>'2000',
                'deskripsi_barang'=>'ini adalah lemari yang besar, kuat, kokoh, serta terlihat mewah',
                'gambar_barang'=>'meja-segilima.png',
                'gambar_detail_barang'=>'meja-segilima.png',
                'kategori_id'=>2
            ],
        ])->each(function ($barang){
            DB::table('barangs')->insert($barang);
        });
    }
}
