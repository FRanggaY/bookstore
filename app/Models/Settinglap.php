<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settinglap extends Model
{
    protected $primaryKey = 'id_setting';
    protected $table = 'tbl_setting_lap';
    protected $fillable = [
        'nama_perusahaan',
        'alamat',
        'no_tlpn',
        'web',
        'logo',
        'no_hp',
        'email',
    ];
    public $timestamps = false;
}
