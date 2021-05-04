<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_perkara extends Model
{
    public $timestamps = false;
    protected $table = 'jenis_perkara';
    protected $primaryKey = 'id_jenis_perkara';
}
