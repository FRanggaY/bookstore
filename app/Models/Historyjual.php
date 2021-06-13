<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historyjual extends Model
{
    protected $table = 'tbl_tmp_penjualan';
    protected $fillable = [
        'id_buku',
        'jumlah_beli',
        'total_harga',
    ];
    public $timestamps = false;
    function book(){
		return $this->belongsTo('App\Models\Book');
	}
}
