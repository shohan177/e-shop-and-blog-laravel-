@extends('frontend.products.app.shop')
@section('shop_body')
<div class="row">

    @foreach ($data as $d)
    <div class="col-md-4 col-sm-6">
        <div class="shop-product">
          <div class="product-thumb">
            <a href="{{ route('products-single',$d -> slug) }}">
              <img src="{{ URL::to('/') }}/media/products/{{ $d -> photo }}" alt="">
            </a>
            <div class="product-overlay"><a href="{{ route('products-single',$d -> slug) }}" class="btn btn-color-out btn-sm">Add To Cart<i class="ti-bag"></i></a>
            </div>
          </div>
          <div class="product-info">
            <h4 class="upper"><a href="{{ route('products-single',$d -> slug) }}">{{ $d -> name }}</a></h4><span>{{ $d -> price }} TK</span>
            <div class="save-product"><a href="{{ route('products-single',$d -> slug) }}"><i class="icon-heart"></i></a>
            </div>
          </div>
        </div>
      </div>


    @endforeach
    </div>

    {{ $data -> links('paginations.pagination') }}

@endsection
