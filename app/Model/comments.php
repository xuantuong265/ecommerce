<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class comments extends Model
{
    protected $table      = 'tbl_comments';
    protected $primaryKey = 'id';
    public    $timestamps = false;
}
