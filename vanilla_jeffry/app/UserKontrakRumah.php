<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserKontrakRumah extends Model
{
    protected $connection= 'mysql';
    protected $primaryKey = 'id_kontrak';
    protected $table= 'user_properti_kontrak';
    public $timestamps = false;
    public $incrementing=false;
    protected $fillable = [
        'id_kontrak'
    ];
}
