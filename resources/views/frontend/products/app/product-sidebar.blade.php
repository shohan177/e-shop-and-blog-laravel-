<div class="col-md-3 hidden-sm hidden-xs">
    <div class="sidebar">
        <div class="widget">
        <h6 class="upper">Search Shop</h6>
        <form>
          <input type="text" placeholder="Search.." class="form-control">
        </form>
      </div>
         <!-- end of widget        -->
      <div class="widget">
        <h6 class="upper">Trending Products</h6>
        <ul class="nav product-list">
          @php
              $recent_product = App\Models\Product::latest() -> take(4) -> get();
          @endphp
          @foreach ($recent_product as $p)
            <li>
                <div class="product-thumbnail">
                <img src="{{ URL::to("/") }}/media/products/{{ $p -> photo }}" alt="">
                </div>
                <div class="product-summary"><a href="#">{{ $p -> name }}</a><span>$199.99</span>
                </div>
            </li>
          @endforeach


        </ul>
      </div>
      <!-- end of widget          -->
      <div class="widget">
        <h6 class="upper">Categories</h6>
        <ul class="nav">
         @php
             $product_category = App\Models\Department::latest() -> get();
         @endphp
         @foreach ($product_category as $c)
         <li><a href="{{ route('products-categorys',$c -> slug) }}">{{ $c -> name }}</a></li>
         @endforeach

        </ul>
      </div>


      <!-- end of widget        -->
      <div class="widget">
        <h6 class="upper">Popular Tags</h6>
        <div class="tags clearfix">
            @php
                $product_tgs = App\Models\Key::latest() -> get();
            @endphp
            @foreach ($product_tgs as $t)
            <a href="{{ route('products-tags',$t -> slug) }}">{{ $t -> name }}</a>
            @endforeach

        </div>
      </div>
      <!-- end of widget      -->
    </div>
    <!-- end of sidebar-->
  </div>
