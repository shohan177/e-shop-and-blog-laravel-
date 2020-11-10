<?php

namespace App\Http\Controllers;

use App\Models\Catagory;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class catagoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.catagory.index');
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
        Catagory::create([
            'name' => $request -> name,
            'slug' => Str::slug($request -> name)
        ]);

        return true;
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
        //
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
        //
    }
    // show all catagory data
    public function showAll(){
        $data = Catagory::latest() -> get();
        $i = 1;
        foreach ($data as $d) {
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $d -> name; ?></td>
                <td><?php echo $d -> slug; ?></td>
                <td>
                   <?php if( $d -> status == "pub" ):?>
                        <span class="badge badge-success">published</span>
                   <?php else: ?>
                        <span class="badge badge-danger">published</span>

                   <?php endif ?>
                </td>
                <td>
                <?php if( $d -> status == "pub" ):?>
                        <a id="hide" href="#" extr="<?php echo $d -> id; ?>" class="btn btn-info"><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                   <?php else: ?>
                        <a  id="show" href="#" extr="<?php echo $d -> id; ?>" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"></i></a>
                   <?php endif ?>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>

                </td>
            </tr>
        <?php
        }


    }


    public function unpublished(Request $request){

        $data = Catagory::find($request -> cid);
        $data -> status = "unpub";
        $data -> update();

        echo $data -> name;


    }

    public function published(Request $request){

        $data = Catagory::find($request -> cid);
        $data -> status = "pub";
        $data -> update();

        echo $data -> name;

    }
}
