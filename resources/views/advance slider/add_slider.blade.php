@extends('layouts.app');
@section('main-body')

<div class="page-wrapper">
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Add Slider</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashbord</a></li>
                        <li class="breadcrumb-item active">Post</li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /Page Header -->

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
                        <ul class="nav nav-tabs nav-tabs-solid nav-justified">
                            <li class="nav-item"><a class="nav-link active" href="#solid-justified-tab1" data-toggle="tab">Image Slider</a></li>
                            <li class="nav-item"><a class="nav-link" href="#solid-justified-tab2" data-toggle="tab">Vedio Slider</a></li>
                            <li class="nav-item"><a class="nav-link " href="#solid-justified-tab3" data-toggle="tab">Messages Slider</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="solid-justified-tab1">
                                <form action="{{ route('store.slide') }}" method="POST" enctype="multipart/form-data">
                                   @csrf
                                    <input  type='text' name="type" value="image" style="display: none">
                                    <div class="form-group row">
                                        <div class="col-sm-6">
                                             <label class="col-lg-3 col-form-label">Sliders Name</label>
                                            <div class="col-lg-9">
                                                <input name="name" type="text" class="form-control">
                                                <input  type='text' name="vedio_url"  style="display: none">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="slider-container">
                                        <div id="slide_body" class="col-xl-10 d-flex">
                                            <div class="card flex-fill shadow">
                                                <div style="width: 100px; margin-left:750px">
                                                    <button style="margin-top: -10px;" type="button" id="adv_add_new_slide" class="btn btn-outline-primary rounded-pill">Add New</button>
                                                </div>



                                                  <div class="card-header" data-toggle="collapse" href="#slider-id">
                                                    <h4 class="card-title">Slider #000 </h4>
                                                  </div>
                                                  <div id="slider-id" class="collapse">
                                                      <div class="card-body">

                                                              <div class="form-group row">
                                                                  <label class="col-lg-3 col-form-label">Photo</label>
                                                                  <div class="col-lg-9">
                                                                   <label for="add_slider_link"><img id="slider_photo11st" style="cursor: pointer; " src="media/default.png" width="200px" alt=""></label>
                                                                    <input name="slider_photo[]" id="add_slider_link" class="slider_up_photo1" type="file" rand_id="1st" style="display: none">
                                                                    <input name="old_image[]" type="text" style="display: none">
                                                                    <input  type='text' name="Rendid[]" value="1st" style="display: none">

                                                                  </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                  <label class="col-lg-3 col-form-label">Title</label>
                                                                  <div class="col-lg-9">
                                                                      <input name="title[]" type="text" class="form-control">
                                                                  </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                  <label class="col-lg-3 col-form-label">Sub Title</label>
                                                                  <div class="col-lg-9">
                                                                      <input name="sub[]" type="text" class="form-control">
                                                                  </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                  <label class="col-lg-3 col-form-label">Button 1 label</label>
                                                                  <div class="col-lg-9">
                                                                      <input name="btn1[]" type="text" class="form-control">
                                                                  </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                  <label class="col-lg-3 col-form-label">Button 1 URL</label>
                                                                  <div class="col-lg-9">
                                                                      <input name="btn1_url[]" type="text" class="form-control">
                                                                  </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                  <label class="col-lg-3 col-form-label">Button 2 label</label>
                                                                  <div class="col-lg-9">
                                                                      <input  name="btn2[]" type="text" class="form-control">
                                                                  </div>
                                                              </div>
                                                              <div class="form-group row">
                                                                  <label class="col-lg-3 col-form-label">Button 2 URL</label>
                                                                  <div class="col-lg-9">
                                                                      <input name="btn2_url[]"  type="text" class="form-control">
                                                                  </div>
                                                              </div>

                                                      </div>
                                                  </div>
                                             </div>
                                         </div>
                                        {{-- load form js --}}

                                    </div>
                                    <div class="text-right">
                                        <button type="submit"  class="btn btn-primary">Save All</button>
                                    </div>
                                </form>





                            </div>
                            <div class="tab-pane" id="solid-justified-tab2">
                                {{-- form start  --}}
                                <form action="{{ route('store.vedio.slider') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                     <input  type='text' name="type" value="vedio" style="display: none">
                                     <div class="form-group row">
                                         <div class="col-sm-6">
                                              <label class="col-lg-3 col-form-label">Sliders Name</label>
                                             <div class="col-lg-9">
                                                 <input name="name" type="text" class="form-control">

                                             </div>
                                         </div>

                                     </div>
                                     <div class="form-group row">
                                        <div class="col-sm-6">
                                        <label class="col-lg-3 col-form-label">vedio Url</label>
                                       <div class="col-lg-9">

                                           <input  type='text' name="vedio_url" class="form-control">
                                       </div>
                                   </div>
                                     </div>


                                     <div class="slider-container-vedio">
                                         <div id="slide_body" class="col-xl-10 d-flex">
                                             <div class="card flex-fill shadow">
                                                 <div style="width: 100px; margin-left:750px">
                                                     <button style="margin-top: -10px;" type="button" id="adv_add_vedio_slide" class="btn btn-outline-primary rounded-pill">Add New</button>
                                                 </div>
                                                   <div class="card-header" data-toggle="collapse" href="#slider-id">
                                                     <h4 class="card-title">Slider #000 </h4>
                                                   </div>
                                                   <div id="slider-id" class="collapse">
                                                       <div class="card-body">
                                                               <div class="form-group row">
                                                                   <label class="col-lg-3 col-form-label">Title</label>
                                                                   <div class="col-lg-9">
                                                                       <input name="title[]" type="text" class="form-control">
                                                                       <input name="Rendid[]" value="1st" type="hidden" class="form-control">
                                                                   </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                   <label class="col-lg-3 col-form-label">Sub Title</label>
                                                                   <div class="col-lg-9">
                                                                       <input name="sub[]" type="text" class="form-control">
                                                                   </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                   <label class="col-lg-3 col-form-label">Button 1 label</label>
                                                                   <div class="col-lg-9">
                                                                       <input name="btn1[]" type="text" class="form-control">
                                                                   </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                   <label class="col-lg-3 col-form-label">Button 1 URL</label>
                                                                   <div class="col-lg-9">
                                                                       <input name="btn1_url[]" type="text" class="form-control">
                                                                   </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                   <label class="col-lg-3 col-form-label">Button 2 label</label>
                                                                   <div class="col-lg-9">
                                                                       <input  name="btn2[]" type="text" class="form-control">
                                                                   </div>
                                                               </div>
                                                               <div class="form-group row">
                                                                   <label class="col-lg-3 col-form-label">Button 2 URL</label>
                                                                   <div class="col-lg-9">
                                                                       <input name="btn2_url[]"  type="text" class="form-control">
                                                                   </div>
                                                               </div>

                                                       </div>
                                                   </div>
                                              </div>
                                          </div>
                                         {{-- load form js --}}

                                     </div>
                                     <div class="text-right">
                                         <button type="submit"  class="btn btn-primary">Save All</button>
                                     </div>
                                 </form>
                                {{-- form end  --}}
                            </div>
                            <div class="tab-pane " id="solid-justified-tab3">
                                {{-- form start  --}}
                                <div class="col-xl-10 d-flex">
                                    <div class="card flex-fill">
                                        <div class="card-header" data-toggle="collapse" href="#multiCollapseExample1">
                                            <h4 class="card-title">Slider #1</h4>
                                        </div>
                                        <div id="multiCollapseExample1" class="collapse">
                                            <div class="card-body">
                                                <form action="#">
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Address 1</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Address 2</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">City</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">State</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Country</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label">Postal Code</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                {{-- form end  --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>




                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

<!-- /Main Wrapper -->

</div>


@endsection
