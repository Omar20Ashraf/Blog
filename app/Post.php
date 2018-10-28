<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //table name
	//change the name of the table
    // protected $$table="name-table"

    //primary key
	//change the primary key field
    // public $primarykey='Ay-ASM';

    //TimeStamp Disable
	//to Disable the timestamp
    // public $timestamp=false;

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }    
}
