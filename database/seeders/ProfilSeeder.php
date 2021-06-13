<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Settinglap;

class ProfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Settinglap = [
            [
               'nama_perusahaan'=>'BookStore Company',
               'alamat'=>'Jakarta',
               'no_tlpn'=>'087871706853',
               'web'=>'bookstore.net',
               'logo'=> 'profil.jpg',
               'no_hp'=> '087871706853',
               'email'=>'bookstore@email.com',
            ],
        ];

        foreach ($Settinglap as $key => $value) {
            Settinglap::create($value);
        }
    }
}
