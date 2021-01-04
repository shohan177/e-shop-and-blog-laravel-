@extends('layouts.app');
@section('main-body')

<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Product Center</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashbord</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ul>
                    <a href="#add_post" class="btn btn-sm btn-primary shadow">ADD POST</a>
                </div>




            </div>

        </div>
        <!-- /Page Header -->
        {{-- @if (Session::has('success'))
            <input name= "mess[]" action="success" bold_mess ="save" type="hidden" value="{{ Session::get('success') }}">
        @endif

        @if (Session::has('del_post'))
            <input name= "mess[]" action="error" bold_mess ="Delete" type="hidden" value="{{ Session::get('del_post') }}">
        @endif --}}






        <div class="row">

            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="post_table" class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>photo</th>
                                        <th>Category</th>
                                        <th>Tag</th>
                                        <th>Time</th>
                                        <th>User</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    <tr>
                                        <td>1</td>
                                        <td>tittel</td>
                                        <td>
                                            image
                                        </td>
                                        <td>
                                           catageory
                                        </td>
                                        <td>
                                            tags
                                        </td>
                                        <td>
                                           12,dec,13
                                        </td>
                                        <td>user name</td>
                                        <td class="text-center">
                                            active
                                        </td>
                                        <td class="text-right">
                                            <div class="actions">


                                                <a class="btn btn-sm bg-info-light border-info shadow" e_post_id="" data-toggle="modal" id="post_edit" href="#">
                                                    <i class="fa fa-pencil-square-o"></i> Edit
                                                </a>
                                                <a class="btn btn-sm bg-danger-light border-danger shadow" id="delete_post" d_post_id="" href="">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>











                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div id="add_post" class="col-sm-8 p-4 ml-3 shadow ">
                <form action="" method="POST" id="add_product" enctype="multipart/form-data">
                    @csrf
                    <h3 class="page-title">Add Product</h3>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Product Name<span class="text-danger">*</span></label>
                                <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Titel">
                                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price <span class="text-danger">*</span></label>
                                <input name="price" type="number" class="form-control"  placeholder="Price">

                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Special price</label>
                                <input name="sp_price" type="number" class="form-control"  placeholder="special Price">
                                <span id="mees_price" class="text-danger"></span>
                            </div>
                        </div>
                    </div>


                    <div class="row">

                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Multiple select category<span class="text-danger">*</span></label>
                                <select id="cat_select" name="dp_id[]"  multiple class="form-control" id="exampleFormControlSelect2">
                                    @foreach ($dp_data as $dp)
                                        <option name="id" value="{{ $dp -> id }}">{{ $dp -> name }}</option>
                                    @endforeach


                                </select>
                              </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Multiple select tag<span class="text-danger">*</span></label>
                                <select id="tag_select" name="key_ids[]" multiple class="form-control" id="exampleFormControlSelect2">
                                    @foreach ($key_data as $key)
                                        <option name="id" value="{{ $key -> id }}">{{ $key -> name }}</option>
                                    @endforeach

                                </select>
                              </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">

                                <input name="photo" style="display: none" type="file" id="product_photo">

                                <label  for="product_photo">Chose a image<img style="display: block; height:110px; width:150px ;cursor: pointer;" src="{{ asset('admin\media\default.png') }}" alt="" id="product_image_view" ></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sort Description<span class="text-danger">*</span></label>
                        <textarea  class="form-control" name="sort_dic" id=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Long Description<span class="text-danger">*</span></label>
                        <textarea class="form-control" name="long_dis" id=""></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Save</button>
                  </form>
            </div>
        </div>

    <br>
    <br>
    <br>

        </div>

    </div>
</div>
<!-- /Main Wrapper -->

</div>


@endsection
