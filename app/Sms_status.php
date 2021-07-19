<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms_status extends Model
{
    public $timestamps = false;
    protected $table = 'sms_status';
    protected $primaryKey = 'id_sms_status';
}
