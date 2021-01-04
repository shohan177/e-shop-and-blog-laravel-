<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function depertments(){

        return $this -> belongsToMany('App\Models\Department');

    }
    public function keys(){

        return $this -> belongsToMany('App\Models\Key');

    }
}
