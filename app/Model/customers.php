<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $table      = 'tbl_customers';
    protected $primaryKey = 'id';
    public    $timestamps = false;
}
