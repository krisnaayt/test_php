<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perkara extends Model
{
    public $timestamps = false;
    protected $table = 'perkara';
    protected $primaryKey = 'id_perkara';

}
