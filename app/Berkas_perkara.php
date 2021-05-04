<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berkas_perkara extends Model
{
    public $timestamps = false;
    protected $table = 'berkas_perkara';
    protected $primaryKey = 'id_berkas';

    function perkara(){
        return $this->hasMany('App\Perkara', 'kode_berkas', 'kode_berkas');
    }

    function berkasStatus(){
        return $this->hasOne('App\Berkas_status', 'id_berkas_status', 'id_berkas_status');
    }

    function userCreated(){
        return $this->hasOne('App\User', 'id_user', 'created_by');
    }

    function userUpdated(){
        return $this->hasOne('App\User', 'id_user', 'updated_by');
    }

    function userApproved(){
        return $this->hasOne('App\User', 'id_user', 'approved_by');
    }
    function userRejected(){
        return $this->hasOne('App\User', 'id_user', 'rejected_by');
    }
}
