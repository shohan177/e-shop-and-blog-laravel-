@extends("frontend.layouts.app")
@section('main_section')
<section class="page-title parallax">
    <div data-parallax="scroll" data-image-src="{{ URL::to("/") }}/frontend/_mpimage.webp" class="parallax-bg"></div>
    <div class="parallax-overlay">
      <div class="centrize">
        <div class="v-center">
          <div class="container">
            <div class="title center">
              <h1 class="upper">Shop</h1>
              <h4>Free Delivery Dhaka.</h4>
              <hr>
            </div>
          </div>
          <!-- end of container-->
        </div>
      </div>
    </div>
  </section>
  <section>
    <div class="container">
      <div class="row">

        {{-- side bar  --}}
       @include("frontend.products.app.product-sidebar")


        <div class="col-md-9">
          <div class="shop-menu">
            <div class="row">
              <div class="col-sm-8">
                <h6 class="upper">Displaying 6 of 18 results</h6>
              </div>
              <div class="col-sm-4">
                <div class="form-select">
                  <select name="type" class="form-control">
                    <option selected="selected" value="">Sort By</option>
                    <option value="">What's new</option>
                    <option value="">Price high to low</option>
                    <option value="">Price low to high</option>
                  </select>
                </div>
              </div>
            </div>
            <!-- end of row-->
          </div>
          <div class="container-fluid">
            @section('shop_body')

            @show
            <!-- end of pagination-->
          </div>
        </div>
      </div>
    </div>
    <!-- end of container-->
  </section>

@endsection
