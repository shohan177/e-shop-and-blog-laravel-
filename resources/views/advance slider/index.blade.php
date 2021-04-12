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

                            @foreach ($sliders as $val)
                                @php
                                    $id = $val -> id;
                                    $slider_data = json_decode($val -> json_data)
                                @endphp
                                @if ($slider_data -> type == "image")
                                    @foreach ($slider_data -> sliders  as $itm)
                                    <div class="card col-lg-3 col-md-4 col-6 m-l-15 shadow border-light">
                                        <div class="card-header">
                                            <i class="fa fa-picture-o" aria-hidden="true"></i><br><h4>{{ $slider_data -> name }}</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="">

                                                <a href="{{ route('single.slider',$id ) }}" class="d-block mb-4 h-100">
                                                <img class="img-fluid img-thumbnail" src="{{ URL::to('/') }}/media/setting/slider/{{ $itm -> photo }}" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    @break
                                    @endforeach
                                @else
                                <div class="card col-lg-3 col-md-4 col-6 m-l-15 shadow border-light">
                                    <div class="card-header">
                                        <i class="fa fa-video-camera" aria-hidden="true"></i><br><h4>{{ $slider_data -> name }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <a href="{{ route('single.slider',$id ) }}" class="d-block mb-4 h-100">
                                                <img  class="img-fluid img-thumbnail" src="{{ URL::to('/') }}/media/default.png" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                @endif



                            @endforeach
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
