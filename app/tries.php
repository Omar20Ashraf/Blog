<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class tries extends Model
{
    use SoftDeletes;
    protected $data=['deleted_at'];
}
