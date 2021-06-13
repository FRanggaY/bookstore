<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Distributor;

class DistributorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Distributor = [
            [
                'nama_distributor' => 'faisal',
               'alamat'=> 'bandung',
               'telpon'=> '12345',
            ],
            [
                'nama_distributor' => 'mahmud',
               'alamat'=> 'bali',
               'telpon'=> '42342',
            ],
            [
                'nama_distributor' => 'machiaveli',
               'alamat'=> 'venice',
               'telpon'=> '5242',
            ],
        ];

        foreach ($Distributor as $key => $value) {
            Distributor::create($value);
        }
    }
}
