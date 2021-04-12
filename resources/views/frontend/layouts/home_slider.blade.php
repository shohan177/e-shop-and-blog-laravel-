@php
    $home_data = App\Models\HomePage::find(1);
    $home = json_decode($home_data -> slider)


@endphp



@if ($home -> type == "image")
<section id="home">
    <!-- Home Slider-->
    <div id="home-slider" class="flexslider">
      <ul class="slides">

        @foreach ($home -> sliders as $val)
        <li>
          <img src="{{ URL::to('/') }}/media/setting/slider/{{ $val -> photo }}" alt="">
          <div class="slide-wrap">
            <div class="slide-content">
              <div class="container">
                <h1>{{ $val -> title }}<span class="red-dot"></span></h1>
                <h6>{{ $val -> sub }}</h6>
                <p><a href="{{ $val -> btn1_url }}" class="btn btn-light-out">{{ $val -> btna1_name }}</a><a href="{{ $val -> btn2_url }}" class="btn btn-color btn-full">{{ $val -> btna2_name }}</a>
                </p>
              </div>
            </div>
          </div>
        </li>
        @endforeach


      </ul>
    </div>
    <!-- End Home Slider-->
</section>
@else
<section id="home">
    <!-- Video background-->
    <div id="video-wrapper" data-fallback-bg="{{ $home -> vedio_url }}">
      <div data-property="{videoURL: '{{ $home -> vedio_url }}' }" class="player"></div>
    </div>
    <!-- end of video background-->
    <!-- Home Slider-->
    <div id="home-slider" class="flexslider">
      <ul class="slides">
        @foreach ($home -> sliders as $item)
        <li>
          <div class="slide-wrap">
            <div class="slide-content text-left bold-text">
              <div class="container">
                <h6>{{ $item -> sub }}</h6>
                <h1 class="upper">{{ $item -> title }}<span class="red-dot"></span></h1>
                <p><a href="{{ $item -> btn1_url }}" class="btn btn-light-out">{{ $item -> btna1_name }}</a><a href="{{ $item -> btn2_url }}" class="btn btn-color btn-full">{{ $item -> btna2_name }}</a>
                </p>
              </div>
            </div>
          </div>
        </li>
        @endforeach


      </ul>
    </div>
    <!-- end of home slider-->
</section>
@endif



<!-- Home section-->

  <!-- end of home section-->
  <!-- end of home section-->
