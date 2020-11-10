<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function test(Request  $request){
        return $request -> all();
    }


    public function testView(){
        return view('post.catagory.index');
    }
}
