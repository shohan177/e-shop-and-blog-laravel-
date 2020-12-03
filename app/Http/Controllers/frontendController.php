<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class frontendController extends Controller
{
    public function homePage(){

        return view('frontend.home');
    }

    public function blog(){
        $post_data = Post::latest() -> get();
        return view('frontend.blog',compact('post_data'));
    }

    public function blog_single(){
        return view('frontend.blog-single');
    }
}
