<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berkas_status extends Model
{
    public $timestamps = false;
    protected $table = 'berkas_status';
    protected $primaryKey = 'id_berkas_status';
}
