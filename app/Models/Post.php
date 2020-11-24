<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function catagories(){

       return $this -> belongsToMany('App\Models\Catagory');
    }

    public function tags(){
        return $this -> belongsToMany('App\Models\Tag');
    }
}
