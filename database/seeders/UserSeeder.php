<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'username'=>'Admin Role',
            'email'=>'admin@role.net',
            'password'=>bcrypt('12345678'),
            'alamat'=>'besito, kudus',
            'no_hp'=>'085155370503'
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'username'=>'Firdan',
            'email'=>'firdanazz@gmail.com',
            'password'=>bcrypt('firdan123'),
            'alamat'=>'colo, kudus',
            'no_hp'=>'082158371526'
        ]);

        $user->assignRole('user');

        $user = User::create([
            'username'=>'Zumar',
            'email'=>'zumar@gmail.com',
            'password'=>bcrypt('zumar123'),
            'alamat'=>'jati, kudus',
            'no_hp'=>'082158373829'
        ]);

        $user->assignRole('user');

        $user = User::create([
            'username'=>'Gavra',
            'email'=>'gavra@gmail.com',
            'password'=>bcrypt('gavra123'),
            'alamat'=>'dawe, kudus',
            'no_hp'=>'082158312824'
        ]);

        $user->assignRole('user');

        $user = User::create([
            'username'=>'Wahyu',
            'email'=>'wahyu@gmail.com',
            'password'=>bcrypt('wahyu123'),
            'alamat'=>'bae, kudus',
            'no_hp'=>'085858123827'
        ]);

        $user->assignRole('user');

        $user = User::create([
            'username'=>'Kalam',
            'email'=>'kalam@gmail.com',
            'password'=>bcrypt('kalam123'),
            'alamat'=>'Gunungkidul, Yogyakarta',
            'no_hp'=>'081548554053'
        ]);

        $user->assignRole('user');
    }
}
