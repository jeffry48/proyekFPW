<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $table = "user";
    public $primaryKey = "id_user";
    public $incrementing = false;
    public $timestamps = false;
    public $guarded = [];
}
