<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notif_berkas extends Model
{
    public $timestamps = false;
    protected $table = 'notif_berkas';
    protected $primaryKey = 'id_notif_berkas';

    function berkasPerkara(){
        return $this->belongsTo('App\Berkas_perkara', 'kode_berkas', 'kode_berkas');
    }

    function berkasStatus(){
        return $this->hasOne('App\Berkas_status', 'id_berkas_status', 'id_berkas_status');
    }

    function userCreated(){
        return $this->hasOne('App\User', 'id_user', 'created_by');
    }
}
