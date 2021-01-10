@extends('layouts.app');
@section('main-body')

<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Settings Center</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashbord</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ul>

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
                {{-- logo section start --}}
                <div class="col-sm-6 ">
                    <div class="card shadow border border-primary">
                        <div class="card-header">
                            Site Logo
                        </div>
                        <form action="" id="logo_form">
                            @csrf
                            <div class="card-body">
                                <label >Site Logo</label><br>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <label for="up_logo"><img id="logo" style="cursor: pointer" src="media\setting\logo\logo.png" class="bg-dark" width="200px"  alt=""></label>
                                        <input name="logo" id="up_logo" type='file' style="display: none">
                                        <input name="logo_old" id="logo_old_valu" type='text' style="display: none">
                                    </div>
                                    <div class="col-sm-">
                                        <input name="size" class="form-control" value="100px" type="text">
                                    </div>
                                </div>
                                <br>
                                <label >sticky Logo</label><br>
                                <div class="row">
                                    <div class="col-sm-7">
                                        <label for="up_stike_logo"><img id="stike_logo" style="cursor: pointer" class="bg-dark" width="200px" src="media\setting\logo\logo.png" alt=""></label>
                                        <input name="stike_logo" id="up_stike_logo" type='file' style="display: none">
                                        <input name="stkie_photo_old" id="stkie_photo_old" type='text' style="display: none">
                                    </div>
                                    <div class="col-sm-">
                                        <input name="stike_size" class="form-control" value="100px" type="text">
                                    </div>

                                </div>

                                <div class="float-right">
                                    <input type="submit" class="btn btn-info " value="Update">
                                 </div>
                            </div>


                        </form>

                      </div>
                </div>
                {{-- logo section end --}}

                {{-- social link strat  --}}
                <div class="col-sm-6">
                    <div class="card shadow border border-primary">
                        <div class="card-header">
                          Social Links
                        </div>
                        <div class="card-body">
                            <form action="" id="socail_form">
                            @csrf
                            <div class="col-auto">
                                <label class="sr-only" for="inlineFormInputGroup">www.facebook.com/shohan</label>
                                <div class="input-group mb-2">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text">Facebook</div>
                                  </div>
                                  <input type="text" name="fb" class="form-control" id="inlineFormInputGroup">
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text">Twitter</div>
                                    </div>
                                    <input type="text" name="tw" class="form-control" id="inlineFormInputGroup">
                                  </div>

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Linkedin</div>
                                    </div>
                                    <input type="text" name="lnk" class="form-control" id="inlineFormInputGroup">
                                </div>

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Instagram</div>
                                    </div>
                                    <input type="text" name="ins" class="form-control" id="inlineFormInputGroup">
                                    </div>

                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">Website</div>
                                    </div>
                                    <input type="text" name="web" class="form-control" id="inlineFormInputGroup">

                                </div>
                                <div class="float-right">
                                    <input type="submit" class="btn btn-info" value="Update">
                                </div>

                            </form>


                              </div>
                        </div>
                      </div>
                    {{-- socail link end --}}
                </div>

            </div>



            <div class="row">

            </div>

        </div>

    </div>
</div>
<!-- /Main Wrapper -->

</div>


@endsection
