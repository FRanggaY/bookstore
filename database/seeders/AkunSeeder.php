<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nama' => 'Andi',
               'alamat'=>'Bandung',
               'telpon'=>'084148429',
               'status'=>'Belum Menikah',
               'username'=>'adminpertama',
               'password'=> bcrypt('12345'),
               'remember_token'=> Str::random(60),
               'akses'=>'admin',
            ],
            [
                'nama' => 'Budi',
               'alamat'=>'Jakarta',
               'telpon'=>'08527232',
               'status'=>'Sudah Menikah',
               'username'=>'manager',
               'password'=> bcrypt('12345'),
               'remember_token'=> Str::random(60),
               'akses'=>'manager',
            ],
            [
                'nama' => 'Ahmad',
               'alamat'=>'Yogyakarta',
               'telpon'=>'08527242',
               'status'=>'Belum Menikah',
               'username'=>'kasirpertama',
               'password'=> bcrypt('12345'),
               'remember_token'=> Str::random(60),
               'akses'=>'kasir',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
