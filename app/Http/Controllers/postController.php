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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
            // for not damage bangla post slag
            // 'slug' => str_replace('','-',$request -> titel),
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
        $post_data = Post::find($id);
        ////////start post category////////
        $post_cat_all = Catagory::all();
        $cat_select = $post_data -> catagories;
           // selected category array
            $cat_check_id =[];
            foreach ($cat_select as $check_cat) {
                array_push( $cat_check_id, $check_cat -> id );
            }
            //
        $all_cat = "";
        foreach ($post_cat_all as $val) {

            $catVal = (in_array($val -> id,$cat_check_id)) ? "selected" : "" ;
            //return
            $all_cat .= '<option value="'. $val -> id.'" '.$catVal.'>'.$val -> name .'</option>';
        };
        ////////end post category////////

        ////////start post tag////////
        $post_tag_all = Tag::all();
        $tag_select = $post_data -> tags;
            // selected tag array
            $tag_check_id =[];
            foreach ($tag_select as $check_tag) {
              array_push($tag_check_id,  $check_tag -> id);
            }
            //
        $all_tag = "";
        foreach ($post_tag_all as $tags) {

            $tagVal = (in_array($tags -> id , $tag_check_id )) ? "selected" : "" ;
            // return
            $all_tag .= '<option value="'. $tags -> id.'" '. $tagVal.'>'.$tags -> name .'</option>';
        };

        ////////end post tag////////

        return[
            'title' => $post_data-> title,
            'photo' => $post_data-> photo,
            'contain' => $post_data-> contain,
            'id' => $post_data-> id,
            'cat_list' => $all_cat,
            'tag_list' => $all_tag,
        ];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        return $request -> all();
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

        // return back() -> with('success','Post delete succesfullty');

    }
    //POST UPDATE
    public function postUpate(Request $request){

        if ($request->hasFile('new_photo')) {
            $img = $request -> new_photo;
            $u_img = md5(time().rand()).'.'.$img -> getClientOriginalExtension();
            $img -> move(public_path('media/post'),$u_img);
            unlink('media/post/' . $request->old_photo);
        } else {

            $u_img = $request->old_photo;
        }



        $post_data = Post::find($request -> id);

        $post_data -> title = $request -> titel;
        $post_data -> contain = $request -> conatin;
        $post_data -> photo = $u_img;
        $post_data -> update();

        $post_data -> catagories() -> detach();
        $post_data -> tags() -> detach();

        $post_data -> catagories() -> attach($request -> cat_id);
        $post_data -> tags() -> attach($request -> tag);



        return back() -> with('info','Post update Successfully');



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
