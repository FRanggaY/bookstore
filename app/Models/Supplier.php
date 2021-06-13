<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $primaryKey = 'id_pasok';
    protected $table = 'tbl_pasok';
    protected $fillable = [
        'jumlah',
    ];
    function book(){
		return $this->belongsTo('App\Models\Book');
	}
    function distributor(){
		return $this->belongsTo('App\Models\Distributor');
	}
}
