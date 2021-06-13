<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $primaryKey = 'id_distributor';
    protected $table = 'tbl_distributor';
    protected $fillable = [
        'nama_distributor',
        'alamat',
        'telpon',
    ];
    public $timestamps = false;
    function pasok(){
		return $this->hasOne('App\Models\Supplier');
	}
}
