<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropertiModel extends Model
{
    protected $connection= 'mysql';
    protected $primaryKey = 'id_properti';
    protected $table= 'properti';
    public $timestamps = false;
    protected $fillable = [
        'id_properti'
        // ,
        // 'jenis_properti',
        // 'kategori_properti',
        // 'deskripsi_properti',
        // 'alamat_properti',
    ];
}
