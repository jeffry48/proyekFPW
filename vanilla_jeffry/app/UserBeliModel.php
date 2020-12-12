<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBeliModel extends Model
{
    protected $connection= 'mysql';
    protected $primaryKey = 'id_beli';
    protected $table= 'user_properti_beli';
    public $timestamps = false;
    public $incrementing=false;
    protected $fillable = [
        'id_beli'
    ];
}
