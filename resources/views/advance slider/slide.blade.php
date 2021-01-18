@extends('layouts.app');
@section('main-body')

<div class="page-wrapper">
    <div class="content container-fluid">

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

<!-- Page Content -->
                        <div class="container">

                            <h3 class="font-weight-light text-center text-lg-left mt-4 mb-0">Slider Gallery</h3>

                            <hr class="mt-2 mb-5">

                            <div class="row text-center text-lg-left">

                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="d-block mb-4 h-100">
                                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/pWkk7iiCoDM/400x300" alt="">
                                    </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="d-block mb-4 h-100">
                                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/aob0ukAYfuI/400x300" alt="">
                                    </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="d-block mb-4 h-100">
                                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/EUfxH-pze7s/400x300" alt="">
                                    </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="d-block mb-4 h-100">
                                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/M185_qYH8vg/400x300" alt="">
                                    </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="d-block mb-4 h-100">
                                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/sesveuG_rNo/400x300" alt="">
                                    </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="d-block mb-4 h-100">
                                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/AvhMzHwiE_0/400x300" alt="">
                                    </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="d-block mb-4 h-100">
                                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/2gYsZUmockw/400x300" alt="">
                                    </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="d-block mb-4 h-100">
                                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/EMSDtjVHdQ8/400x300" alt="">
                                    </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="d-block mb-4 h-100">
                                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/8mUEy0ABdNE/400x300" alt="">
                                    </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="d-block mb-4 h-100">
                                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/G9Rfc1qccH4/400x300" alt="">
                                    </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="d-block mb-4 h-100">
                                    <img class="img-fluid img-thumbnail" src="https://source.unsplash.com/aJeH0KcFkuc/400x300" alt="">
                                    </a>
                            </div>
                            <div class="col-lg-3 col-md-4 col-6">
                                <a href="#" class="d-block mb-4 h-100">
                                    <img class="img-fluid img-thumbnail" src="{{ URL::to('/') }}/media/plus.png" alt="">
                                    </a>
                            </div>
                            </div>

                        </div>
  <!-- /.container -->



                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- /Main Wrapper -->

</div>


@endsection
