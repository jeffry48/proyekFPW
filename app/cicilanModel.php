<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cicilanModel extends Model
{
    protected $connection= 'mysql';
    public $table = "cicilan";
    public $primaryKey = "id_cicilan";
    public $timestamps = false;
    public $guarded = [];
}
