@extends('layouts.app');
@section('main-body')

<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Post Center</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashbord</a></li>
                        <li class="breadcrumb-item active">Post</li>
                    </ul>
                    <a href="#add_post" class="btn btn-sm btn-primary shadow">ADD POST</a>
                </div>




            </div>

        </div>
        <!-- /Page Header -->
        @if (Session::has('success'))
            <input name= "mess[]" action="success" bold_mess ="save" type="hidden" value="{{ Session::get('success') }}">
        @endif

        @if (Session::has('del_post'))
            <input name= "mess[]" action="error" bold_mess ="Delete" type="hidden" value="{{ Session::get('del_post') }}">
        @endif






        <div class="row">

            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="post_table" class="table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titlel</th>
                                        <th>photp</th>
                                        <th>Category</th>
                                        <th>Tag</th>
                                        <th>Time</th>
                                        <th>User</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-right">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post_data as $d)


                                    <tr>
                                        <td>{{ $loop -> index + 1 }}</td>
                                        <td>{{ $d ->  title }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                @if (!empty($d -> photo))
                                                    <a href="profile.html" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="media\post\{{ $d -> photo }}" alt="User Image"></a>
                                                @endif


                                            </h2>
                                        </td>
                                        <td>
                                            @foreach ($d -> catagories as $item)
                                            <i class="fa fa-bookmark-o" style="color:rgb(235, 127, 3)"  valu aria-hidden="true"></i> {{ $item -> name }}
                                            @endforeach


                                        </td>
                                        <td>
                                            @foreach ($d -> tags as $item)
                                            <i class="fa fa-tags" style="color:rgb(10, 207, 197)"  aria-hidden="true"></i>  {{ $item -> name }}
                                            @endforeach

                                        </td>
                                        <td>
                                            <i class="fa fa-clock-o" style="color:rgb(111, 88, 241)"  aria-hidden="true"></i>  {{ $d -> updated_at -> diffForHumans() }}
                                        </td>
                                        <td><i class="fa fa-user-o" style="color:rgb(47, 153, 252)" aria-hidden="true"></i>  {{ $d -> user_name -> name }}</td>
                                        <td class="text-center">
                                            @if ($d -> status == 1)
                                             <span class="badge badge-pill bg-success inv-badge">Active</span>
                                            @else
                                            <span class="badge badge-pill bg-danger inv-badge">Active</span>
                                            @endif

                                        </td>
                                        <td class="text-right">
                                            <div class="actions">
                                               @if ($d -> status == 1)
                                                    <a class="btn btn-sm bg-warning-light border-warning shadow"  href="{{ url('post-deactive/'.$d -> id.'/'.'0') }}">
                                                        <i class="fa fa-eye-slash"></i> deactive
                                                    </a>
                                               @else
                                                    <a class="btn btn-sm bg-success-light border-success shadow"  href="{{ url('post-deactive/'.$d -> id.'/'.'1') }}">
                                                        <i class="fa fa-eye-slash"></i> Active
                                                    </a>
                                               @endif

                                                <a class="btn btn-sm bg-info-light border-info shadow" e_post_id="{{ $d -> id }}" data-toggle="modal" id="post_edit" href="#">
                                                    <i class="fa fa-pencil-square-o"></i> Edit
                                                </a>
                                                <a class="btn btn-sm bg-danger-light border-danger shadow" id="delete_post"  href="{{ url('post-delete/'.$d -> id) }}">
                                                    <i class="fe fe-trash"></i> Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    @endforeach









                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="row">
            <div id="add_post" class="col-sm-8 p-4 ml-3 shadow">
                <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h3 class="page-title">Add Post</h3>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Post Tiltel</label>
                      <input name="titel" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Titel">
                      {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                    </div>
                    <div class="row">

                        <div class="col-sm-5">
                            <div class="form-group">
                                <label for="exampleFormControlSelect2"> Multiple select category</label>
                                <select name="cat_id[]"  multiple class="form-control" id="exampleFormControlSelect2">


                                @foreach ($category_data as $d)
                                    <option name="id" value="{{ $d-> id }}">{{ $d-> name }}</option>
                                @endforeach


                                </select>
                              </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect2">Multiple select tag</label>
                                <select name="tag[]" multiple class="form-control" id="exampleFormControlSelect2">
                                    @foreach ($tag_data as $d)
                                     <option value="{{ $d-> id }}">{{ $d-> name }}</option>
                                    @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">

                                <input name="photo" style="display: none" type="file" id="up_photo">

                                <label  for="up_photo">Chose a image<img style="display: block; height:110px; width:150px ;cursor: pointer;" src="{{ asset('admin\media\default.png') }}" alt="" id="post_image_view" ></label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="conatin" id="post_contain"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
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
