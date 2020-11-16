<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use PhpParser\Node\Stmt\Foreach_;

class tagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        Tag::create([
            'name' => $request -> name,
            'slug' => Str::slug($request -> name)
        ]);

        return $request -> name;
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
    //show all
    public function showAll(){
        $data = Tag::latest() -> get();
        $i = 1;
        foreach ($data as $d) {
        ?>

            <tr>
            <td><?php echo $i++?></td>
            <td><?php echo $d->name;?></td>
            <td><?php echo $d->slug;?></td>
            <td>

                    <span class="badge badge-pill bg-success inv-badge">Active</span>

            </td>
            <td>
                <a id="hide" class="btn  btn-info" href="#" extr="" ><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                 <a href="#" id="tag_edit" extr="" class="btn btn-sm btn-secondary">Edit</a>
                <a href="#" class="btn btn-sm  bg-info-light border-warning"  id="delete_tag" extr="" ><i class="fe fe-trash"></i> Delete</a>

            </td>


            <?php
        }
    }


}
