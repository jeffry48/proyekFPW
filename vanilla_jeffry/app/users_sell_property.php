<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users_sell_property extends Model
{
    public $table = "user_properti_jual";
    public $primaryKey = "id_jual";
    public $incrementing = false;
    public $timestamps = false;
    public $guarded = [];
}
