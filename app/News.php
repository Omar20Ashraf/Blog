<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
	use SoftDeletes;
    protected $fillable = ['add_by','title','desc','status'];
    protected $date     = ['delete_at'];
    
}
