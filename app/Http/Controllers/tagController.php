<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\str;
use PhpParser\Node\Stmt\Foreach_;

class tagController extends Controller
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
        $data = Tag::find($id);
        return $data;
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
        $data = Tag::find($request -> id);
        $data -> name = $request -> name;
        $data -> update();
        return $request -> name;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Tag::find($id);
        $data -> delete();

        return $data -> name;
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
                <?php if($d -> status == "active"):?>
                    <span class="badge badge-pill bg-success inv-badge">Active</span>
                <?php else:?>
                    <span class="badge badge-pill bg-danger inv-badge shadow">Active</span>
                <?php endif ?>
            </td>
            <td>
                <?php if($d -> status == "active"):?>
                    <a id="tag_status_dactive" class="btn  btn-info" href="#" extr="<?php echo $d->id;?>" ><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                <?php else:?>
                    <a id="tag_status_active" class="btn  bg-success-light border-success shadow" href="#" extr="<?php echo $d->id;?>" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                <?php endif ?>
                 <a href="#" id="tag_edit" extr="<?php echo $d->id;?>" class="btn btn-sm btn-secondary">Edit</a>
                <a href="#" class="btn btn-sm  bg-info-light border-warning"  id="delete_tag" extr="<?php echo $d->id;?>" ><i class="fe fe-trash"></i> Delete</a>

            </td>


            <?php
        }
    }

    //active tag action
    function active($id, $action){

        if ($action == "deactivate"){

            $data = Tag::find($id);
            $data -> status = "deactivate";
            $data -> update();
            return $data -> name;

        }elseif($action == "active"){

            $data = Tag::find($id);
            $data -> status = "active";
            $data -> update();
            return $data -> name;

        }
    }


}
