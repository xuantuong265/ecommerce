<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $table = 'tbl_category';
    protected $primaryKey = 'id';

    public function brand()
    {
        return $this->hasMany('App\Model\brand', 'category_id');
    }
}
