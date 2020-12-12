<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buktiPembelianModel extends Model
{
    public $table = "bukti_pembelian";
    public $primaryKey = "id_terbeli";
    public $incrementing = false;
    public $timestamps = false;
    public $guarded = [];
}
