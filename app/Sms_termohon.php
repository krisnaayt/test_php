<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sms_termohon extends Model
{
    public $timestamps = false;
    protected $table = 'sms_termohon';
    protected $primaryKey = 'id_sms_termohon';
}
