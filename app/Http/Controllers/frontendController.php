<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Department;
use App\Models\Key;
use App\Models\Post;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;

class frontendController extends Controller
{

    // blog start
    public function homePage(){

        return view('frontend.home');
    }

    public function blog(){
        $post_data = Post::latest() -> paginate(5);
        return view('frontend.blog',compact('post_data'));
    }

    public function blog_single($slug){
        $s_post = Post::where('slug',$slug) -> first();
        return view('frontend.blog-single',compact('s_post'));
    }

    public function searchBlogCat($slug){
        $category_s_post = Catagory::where('slug',$slug) -> first();
        return view("frontend.search_categoy_blog",compact('category_s_post'));
    }

    public function searchBlogTag($slug){
        $tag_s_post = Tag::where('slug',$slug) -> first();
        return view("frontend.search_tag_blog",compact('tag_s_post'));
    }
    public function recentBlog($slug){
        $post = Post::where('slug',$slug) -> first();
        return view("frontend.recent_blog",compact('post'));
    }

    // blog end

    // product start
    public function productShow(){
        $products = Product::latest() -> paginate(9);
        return view('frontend.products.products',compact('products'));
    }

    public function productByCategory($slug){
        $ctegorys = Department::where('slug',$slug) -> first();
        return view("frontend.products.category_products",compact('ctegorys'));
    }

    public function productBytag($slug){
        $tag = Key::where('slug',$slug) -> first();
        return view("frontend.products.tag_products",compact('tag'));
    }
}
