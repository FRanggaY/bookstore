<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Book = [
            [
                'judul'=> 'Without Name',
               'noisbn'=> '12345',
               'penulis'=> 'Test123',
               'penerbit'=> 'Gramed',
               'tahun'=> '2004',
               'stok'=> '50',
               'harga_pokok'=> '10000',
               'harga_jual'=> '15000',
               'ppn'=> '15',
               'diskon'=> '10',
            ],
            [
                'judul'=> 'Find Me',
               'noisbn'=> '567890',
               'penulis'=> 'Test234',
               'penerbit'=> 'Gramed',
               'tahun'=> '2018',
               'stok'=> '10',
               'harga_pokok'=> '12000',
               'harga_jual'=> '16000',
               'ppn'=> '12',
               'diskon'=> '14',
            ],
            [
                'judul'=> 'Left to War',
               'noisbn'=> '23456',
               'penulis'=> 'Test254',
               'penerbit'=> 'Gramed',
               'tahun'=> '2020',
               'stok'=> '4',
               'harga_pokok'=> '50000',
               'harga_jual'=> '60000',
               'ppn'=> '12',
               'diskon'=> '14',
            ],
        ];

        foreach ($Book as $key => $value) {
            Book::create($value);
        }
    }
}
