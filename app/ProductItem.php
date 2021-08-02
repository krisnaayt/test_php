<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'item_id';
}
