<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BeliModel extends Model
{
    protected $connection= 'mysql';
    protected $primaryKey = 'id_terbeli';
    protected $table= 'bukti_pembelian';
    public $timestamps = false;
    protected $fillable = [
        'id_terbeli'
    ];
}
