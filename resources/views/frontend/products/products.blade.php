@extends('frontend.products.app.shop')
@section('shop_body')
<div class="row">

    @foreach ($products as $d)
    <div class="col-md-4 col-sm-6">
        <div class="shop-product">
          <div class="product-thumb">
            <a href="#">
              <img src="media\products\{{ $d -> photo }}" alt="">
            </a>
            <div class="product-overlay"><a href="#" class="btn btn-color-out btn-sm">Add To Cart<i class="ti-bag"></i></a>
            </div>
          </div>
          <div class="product-info">
            <h4 class="upper"><a href="#">{{ $d -> name }}</a></h4><span>{{ $d -> s_price }} TK</span>
            <div class="save-product"><a href="#"><i class="icon-heart"></i></a>
            </div>
          </div>
        </div>
      </div>


    @endforeach
    </div>

     {{ $products -> links() }}
    <!-- end of row-->
    <ul class="pagination">
      <li><a href="#" aria-label="Previous"><span aria-hidden="true"><i class="ti-arrow-left"></i></span></a>
      </li>
      <li class="active"><a href="#">1</a>
      </li>
      <li><a href="#">2</a>
      </li>
      <li><a href="#">3</a>
      </li>
      <li><a href="#">4</a>
      </li>
      <li><a href="#">5</a>
      </li>
      <li><a href="#" aria-label="Next"><span aria-hidden="true"><i class="ti-arrow-right"></i></span></a>
      </li>
    </ul>

@endsection
