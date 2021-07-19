<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms_akta extends Model
{
    public $timestamps = false;
    protected $table = 'sms_akta';
    protected $primaryKey = 'id_sms_akta';
}
