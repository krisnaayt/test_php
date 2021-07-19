<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms_pemohon extends Model
{
    public $timestamps = false;
    protected $table = 'sms_pemohon';
    protected $primaryKey = 'id_sms_pemohon';
}
