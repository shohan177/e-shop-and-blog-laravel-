@extends('frontend.layouts.app')
@section('main_section')
<section>
    <div class="container">
      <div class="single-product-details">
        <div class="row">
          <div class="col-md-6">
            <div data-options="{&quot;animation&quot;: &quot;slide&quot;, &quot;controlNav&quot;: true}" class="flexslider nav-inside control-nav-dark">
              <ul class="slides">
                <li>
                  <img src="{{ URL::to('/')}}/media/products/{{ $single_product -> photo }}" alt="">
                </li>
                {{-- <li>
                  <img src="frontend/images/shop/single-2.jpg" alt="">
                </li>
                <li>
                  <img src="frontend/images/shop/single-3.jpg" alt="">
                </li>
                <li>
                  <img src="frontend/images/shop/single-4.jpg" alt="">
                </li>
              </ul> --}}
            </div>
          </div>
          <div class="col-md-5 col-md-offset-1">
            <div class="title mt-0">
              <h3>{{ $single_product -> name }}<span class="red-dot"></span></h3>
              <p class="m-0">Free Shipping Worldwide</p>
            </div>
            <div class="single-product-price">
              <div class="row">
                <div class="col-xs-6">
                  <h3>

                    @if ($single_product -> s_price == null)
                        <span>{{ $single_product -> price }} TK</span>
                    @else
                        <del>{{ $single_product -> price }} TK</del><span>{{ $single_product -> s_price }} TK</span>
                    @endif



                    </h3>
                </div>
                <div class="col-xs-6 text-right"><span class="rating-stars"><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star"></i><span class="hidden-xs">(3 Reviews)</span></span>
                </div>
              </div>
            </div>
            <div class="single-product-desc">
                {!! Str::of(htmlspecialchars_decode($single_product -> sort_dic))!!}
            </div>
            <div class="single-product-add">
              <form action="#" class="inline-form">
                <div class="input-group">
                  <input type="number" placeholder="QTY" value="1" min="1" class="form-control"><span class="input-group-btn"><button type="button" class="btn btn-color">Add to Cart<i class="ti-bag"></i></button></span>
                </div>
              </form>
            </div>
            <div class="single-product-list">
              <ul>
                <li><span>Sizes:</span> S, M, L, XL</li>
                <li><span>Colors:</span> Blue, Red, Grey</li>
                <li><span>Category:</span>

                    @foreach ($single_product -> depertments as $c)
                        <a href="{{ route('products-categorys', $c -> slug) }}">{{ $c -> name }}</a>
                    @endforeach

                </li>
                <li><span>Tags:</span>
                    @foreach ($single_product -> keys as $t)
                        -<a href="{{ route('products-tags',$t -> slug) }}">{{ $t -> name }}</a>
                    @endforeach


                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- end of row-->
      </div>
      <div class="product-tabs">
        <ul role="tablist" class="nav nav-tabs">
          <li role="presentation" class="active"><a href="#first-tab" role="tab" data-toggle="tab">Description</a>
          </li>
          <li role="presentation"><a href="#second-tab" role="tab" data-toggle="tab">Sizes</a>
          </li>
          <li role="presentation"><a href="#third-tab" role="tab" data-toggle="tab">Reviews (3)</a>
          </li>
        </ul>
        <div class="tab-content">
          <div id="first-tab" role="tabpanel" class="tab-pane active">
            {!! Str::of(htmlspecialchars_decode($single_product -> sort_dic))!!}
          </div>
          <div id="second-tab" role="tabpanel" class="tab-pane">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th class="upper">Size</th>
                  <th class="upper">Bust (CM)</th>
                  <th class="upper">Waist (CM)</th>
                  <th class="upper">Hips (CM)</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>XS</td>
                  <td>78</td>
                  <td>60</td>
                  <td>83</td>
                </tr>
                <tr>
                  <td>S</td>
                  <td>80</td>
                  <td>62</td>
                  <td>86</td>
                </tr>
                <tr>
                  <td>M</td>
                  <td>88</td>
                  <td>65</td>
                  <td>88</td>
                </tr>
              </tbody>
            </table>
          </div>
          <div id="third-tab" role="tabpanel" class="tab-pane">
            <div id="comments">
              <ul class="comments-list">
                <li class="rating">
                  <h5 class="upper">Jesse Pinkman - <span class="rating-stars"><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star"></i></span></h5><span class="comment-date">Posted on 29 September at 10:41</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo voluptatem quo sit. Sint fugit quidem totam similique suscipit animi veniam reiciendis, unde facere quia, optio, at ad possimus perferendis asperiores.</p>
                </li>
                <li class="rating">
                  <h5 class="upper">Rust Cohle - <span class="rating-stars"><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star"></i></span></h5><span class="comment-date">Posted on 29 September at 10:41</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi aspernatur vero dolorum asperiores ratione obcaecati atque quidem aliquid dicta illo, quod, similique suscipit maiores, aperiam expedita cum. Ut fugiat, dolores.</p>
                </li>
                <li class="rating">
                  <h5 class="upper">Arya Stark - <span class="rating-stars"><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i><i class="ti-star full"></i></span></h5><span class="comment-date">Posted on 29 September at 10:41</span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi aspernatur vero dolorum asperiores ratione obcaecati atque quidem aliquid dicta illo, quod, similique suscipit maiores, aperiam expedita cum. Ut fugiat, dolores.</p>
                </li>
              </ul>
            </div>
            <div id="respond">
              <h5 class="upper">Leave a rating</h5>
              <div class="comment-respond">
                <form class="comment-form">
                  <div class="form-double">
                    <div class="form-group">
                      <input name="author" type="text" placeholder="Name" class="form-control">
                    </div>
                    <div class="form-group last">
                      <input name="email" type="text" placeholder="Email" class="form-control">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="form-select">
                      <select class="form-control">
                        <option value="" selected="selected">Chose a rating</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <textarea placeholder="Comment" class="form-control"></textarea>
                  </div>
                  <div class="form-submit text-right">
                    <button type="button" class="btn btn-color-out">Post Comment</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="related-products">
        <h5 class="upper">Related Products</h5>
        <div class="row">
        @foreach ($single_product -> depertments -> take(2)  as $c)

            @php
                $dp_slug = $c -> slug;
                $depertment = App\Models\Department::where('slug',$dp_slug) -> first();
            @endphp
            @foreach ($depertment -> products -> take(2) as $p)
                    <div class="col-md-3 col-sm-6">
                        <div class="shop-product">
                            <div class="product-thumb">
                            <a href="{{ route('products-single',$p -> slug) }}">
                                <img src="{{ URL::to('/')}}/media/products/{{ $p -> photo }}" alt="">
                            </a>
                            </div>
                            <div class="product-info">
                            <h4 class="upper"><a href="{{ route('products-single',$p -> slug) }}">{{ $p -> name }}</a></h4><span>{{ $p -> price }}</span>
                            <div class="save-product"><a href="{{ route('products-single',$p -> slug) }}"><i class="icon-heart"></i></a>
                            </div>
                            </div>
                        </div>
                    </div>
            @endforeach



         @endforeach
        </div>

      </div>
    </div>
  </section>
@endsection
