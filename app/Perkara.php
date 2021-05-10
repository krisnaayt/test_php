<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perkara extends Model
{
    public $timestamps = false;
    protected $table = 'perkara';
    protected $primaryKey = 'id_perkara';

    function jenisPerkara(){
        return $this->hasOne('App\Jenis_perkara', 'id_jenis_perkara', 'id_jenis_perkara');
    }


}
