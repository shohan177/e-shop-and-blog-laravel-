<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use App\Models\Category_post;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $category_data = Catagory::all();
        $tag_data = Tag::all();
        $post_data = Post::all();
        return view('post.index',compact('category_data','tag_data','post_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //photo updoad
        if ($request -> hasFile('photo')) {

            $img = $request -> photo;
            $u_img = md5(time().rand()).'.'.$img -> getClientOriginalExtension();
            $img -> move(public_path('media/post'),$u_img);

        } else {
            $u_img = "";
        }


        $post_data_push = Post::create([
            'title' => $request -> titel,
            'slug' => Str::slug($request -> titel),
            'status' => 1,
            'contain' => $request -> conatin,
            'photo' => $u_img,
            'user_id' => Auth::user() -> id,
        ]);

        $post_data_push -> catagories() -> attach($request -> cat_id);
        $post_data_push -> tags() -> attach($request -> tag);
        return back() -> with('success','Save to database');




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::find($id);
       $data -> delete();

        return back() -> with('del_post','Post delete succesfullty');

    }

    // post status
    public function status($id, $action){
        if($action == 0){

            $data = Post::find($id);
            $data -> status = 0;
            $data -> update();

            return back();

        }else{
            $data = Post::find($id);
            $data -> status = 1;
            $data -> update();

            return back();

        }


    }
}
