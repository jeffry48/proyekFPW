<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    public $table = "properti";
    public $primaryKey = "id_properti";
    public $incrementing = false;
    public $timestamps = false;
    public $guarded = [];
}
