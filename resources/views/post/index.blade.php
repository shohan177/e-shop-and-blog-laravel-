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


        <div class="row">

            <div class="col-sm-12">
                <div class="card">

                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Titlel</th>
                                        <th>photp</th>
                                        <th>Category</th>
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
                                                {{ $item -> name }} ,
                                            @endforeach


                                        </td>
                                        <td>
                                            @foreach ($d -> tags as $item)
                                                 {{ $item -> name }} ,
                                            @endforeach

                                        </td>
                                        <td>admin</td>
                                        <td class="text-center">
                                            <span class="badge badge-pill bg-success inv-badge">Paid</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="actions">
                                                <a class="btn btn-sm bg-warning-light border-warning shadow" data-toggle="modal" href="#delete_modal">
                                                    <i class="fa fa-eye-slash"></i> deactive
                                                </a>
                                                <a class="btn btn-sm bg-info-light border-info shadow" data-toggle="modal" href="#delete_modal">
                                                    <i class="fa fa-pencil-square-o"></i> Edit
                                                </a>
                                                <a class="btn btn-sm bg-danger-light border-danger shadow" data-toggle="modal" href="#delete_modal">
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
