<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class buktiPengontrakan extends Model
{
    public $table = "bukti_kontrak";
    public $primaryKey = "id_terkontrak";
    public $incrementing = false;
    public $timestamps = false;
    public $guarded = [];
}
