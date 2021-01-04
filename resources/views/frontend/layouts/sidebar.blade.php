 <div class="col-md-3 col-md-offset-1">
          <div class="sidebar hidden-sm hidden-xs">
            <div class="widget">
              <h6 class="upper">Search blog</h6>
              <form>
                <input type="text" placeholder="Search.." class="form-control">
              </form>
            </div>
            <!-- end of widget        -->
            <div class="widget">
              <h6 class="upper">Categories</h6>
              <ul class="nav">
                @php
                    $categorys = App\Models\Catagory::all()


                @endphp

                @foreach ($categorys as $val)
                    <li>
                        <a href="{{ route('bolg_category_search',$val -> slug ) }}">{{ $val -> name }}</a>
                    </li>
                @endforeach


              </ul>
            </div>
            <!-- end of widget        -->
            <div class="widget">
              <h6 class="upper">Popular Tags</h6>
              <div class="tags clearfix">
                @php
                    $tags  = App\Models\Tag::all()
                @endphp
                  @foreach ($tags as $val)
                      <a href="{{ route('bolg_tag_search',$val -> slug) }}">{{ $val -> name  }}</a>
                  @endforeach

              </div>
            </div>
            <!-- end of widget      -->
            <div class="widget">
              <h6 class="upper">Latest Posts</h6>
              <ul class="nav">
                @php
                   $latest_post = App\Models\Post::latest() -> get()
                @endphp
                @foreach ($latest_post as $item)

                    <li><a href="{{ route('recent_blog',$item -> slug) }}">{{ $item -> title }}<i class="ti-arrow-right"></i><span>{{ date('d .M .y', strtotime($item -> updated_at)) }}</span></a>
                    </li>
                @endforeach


              </ul>
            </div>
            <!-- end of widget          -->
          </div>
          <!-- end of sidebar-->
        </div>
