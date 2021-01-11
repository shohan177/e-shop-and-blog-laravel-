@extends('layouts.app');
@section('main-body')

<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Slider Gallary</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashbord</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ul>

                </div>




            </div>

        </div>

        @php
            $slider_data = App\Models\Sliders::latest() -> get();
        @endphp
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
                                <table class="datatable table table-hover table-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>Photo 1</th>
                                            <th>Title 1</th>
                                            <th>Sub Title 1</th>
                                            <th>Photo 2</th>
                                            <th>Title 2</th>
                                            <th>Sub Title 2</th>
                                            <th>Account Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($slider_data as $val)
                                            @php
                                               $slider = json_decode($val -> json_data)
                                            @endphp
                                              <tr>
                                            <td class="bg-info-light">
                                                 <a href="profile.html" class="avatar avatar-sm mr-2"><img width="250px" src="{{ URL::to('/') }}/media/setting/slider/{{ $slider -> photo1 }}"></a>

                                            </td>
                                            <td class="bg-info-light" >{{ $slider -> tilte1 }}</td>

                                            <td class="bg-info-light">{{ $slider -> sub1 }}</td>

                                            <td class="bg-warning-light">
                                                <a href="profile.html" class="avatar avatar-sm mr-2"><img  src="{{ URL::to('/') }}/media/setting/slider/{{ $slider -> photo2 }}" ></a>
                                            </td>
                                            <td class="bg-warning-light">
                                                {{ $slider -> tilte2 }}
                                            </td>
                                            <td class="bg-warning-light">
                                                {{ $slider -> sub2 }}
                                            </td>

                                            <td class="bg-success-light">
                                                <div class="status-toggle">
                                                    <input type="checkbox" id="status_1" class="check" checked>
                                                    <label for="status_1" class="checktoggle">checkbox</label>
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
                <div class="col-sm-12 ">
                    <div class="card shadow border border-primary">
                        <div class="card-header">
                            Site Logo
                        </div>
                        <form action="{{ route('slider') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <label >Slider One</label><br>
                                <div class="row" >
                                    <div class="col-sm-4">
                                        <label for="slider_up_photo1"><img id="slider_photo1" style="cursor: pointer" src="media\default.png"  width="200px"  alt=""></label>
                                        <input name="slider_photo1" id="slider_up_photo1" type='file' style="display: none">
                                        <input  type='text' style="display: none">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="ti1">Title</label>
                                        <textarea class="form-control" id="ti1" name="tilte_1" id="" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="sub1">Sub title</label>
                                        <textarea class="form-control" id="sub1" name="sub_tilte_1" id="" cols="30" rows="3"></textarea>
                                    </div>
                                </div>
                                <br >
                                <label  >Slider two</label><br>
                                <div class="row" >
                                    <div class="col-sm-4">
                                        <label for="slider_up_photo2"><img id="slider_photo2" style="cursor: pointer"  width="200px" src="media\default.png" alt=""></label>
                                        <input name="slider_photo2" id="slider_up_photo2" type='file' style="display: none">
                                        <input  type='text' style="display: none">
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="ti2">Title</label>
                                        <textarea class="form-control" id="ti2" name="tilte_2" id="" cols="30" rows="3"></textarea>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="sub2">Sub title</label>
                                        <textarea class="form-control" id="sub2" name="sub_tilte_2" id="" cols="30" rows="3"></textarea>
                                    </div>

                                </div>

                                <div class="float-right">
                                    <input type="submit" class="btn btn-info " value="SAVE">
                                 </div>
                            </div>


                        </form>

                      </div>
                </div>
            </div>
        </div>

            </div>

        </div>

    </div>
</div>
<!-- /Main Wrapper -->

</div>


@endsection
