<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'id_buku';
    protected $table = 'tbl_buku';
    protected $fillable = [
        'judul',
        'noisbn',
        'penulis',
        'penerbit',
        'tahun',
        'stok',
        'harga_pokok',
        'harga_jual',
        'ppn',
        'diskon',
    ];
    public $timestamps = false;

    public function getfakturID()
    {
        return sprintf('FK%05d', $this->id_buku);
    }

    // function sell(){
	// 	return $this->hasOne('App\Models\Sell');
	// }
    // function pasok(){
	// 	return $this->hasOne('App\Models\Supplier');
	// }
}
