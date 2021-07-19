<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms_send_akta_log extends Model
{
    public $timestamps = false;
    protected $table = 'sms_send_akta_log';
    protected $primaryKey = 'id_send_akta_log';
}
