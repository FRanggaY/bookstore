<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sell extends Model
{
    protected $table = 'tbl_penjualan';
    protected $fillable = [
        'id_kasir',
        'id_buku',
        'jumlah_beli',
        'bayar',
        'kembalian',
        'total_harga',
        'created_at',
        'updated_at',
    ];
    // function book(){
	// 	return $this->belongsTo('App\Models\Book');
	// }
}
