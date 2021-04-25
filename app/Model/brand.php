<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table = 'tbl_brand';
    protected $primaryKey = 'id';

    public function products()
    {
        return $this->hasMany('App\Model\products', 'id_b');
    }
}
