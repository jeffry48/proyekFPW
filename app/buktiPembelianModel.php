<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buktiPembelianModel extends Model
{
    protected $connection= 'mysql';
    protected $table = "bukti_pembelian";
    protected $primaryKey = "id_terbeli";
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [
        'id_terbeli'
    ];
}
