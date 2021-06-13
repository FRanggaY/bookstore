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
    function historyjual(){
		return $this->hasMany('App\Models\Historyjual');
	}
    function sell(){
		return $this->hasOne('App\Models\Sell');
	}
    function pasok(){
		return $this->hasOne('App\Models\Supplier');
	}
}
