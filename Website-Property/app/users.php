<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    //SELECT `id_user`, `nama_user`, `no_telp_user`, `email_user`, `username_user`, `password_user` FROM `user` WHERE 1
    protected $connection= 'mysql';
    protected $primaryKey = 'id_user';
    protected $table= 'user';
    public $timestamps = false;
    protected $guarded = [
    ];
}
