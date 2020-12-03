<!DOCTYPE html>
<html lang="en">



<head>
    @include('frontend.layouts.head')
</head>

  <body>
    <!-- Preloader-->
    <div id="loader">
      <div class="centrize">
        <div class="v-center">
          <div id="mask">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>
      </div>
    </div>
    <!-- End Preloader-->
    <!-- Navigation Bar-->
    @include('frontend.layouts.menu')
    <!-- End Navigation Bar-->

    {{-- load body section --}}
    @section('main_section')
    @show


    <!-- Footer-->
        @include('frontend.layouts.footer')
    <!-- end of footer-->
        @include("frontend.layouts.script_links")
  </body>



</html>
