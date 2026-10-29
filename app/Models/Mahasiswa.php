<?php

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Authenticatable{
    protected $table = 'mahasiswa';
    protected $fillable = ['nama','nim',  'email'];
    protected $hidden = ['password'];
}
