<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="active">
                    <a href="{{ route('home') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span> Reports</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="invoice-report.html">Invoice Reports</a></li>
                    </ul>
                </li>
                <li class="menu-title">
                    <span>Post</span>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span>Post</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('post-catagory.index') }}"> Post Setting </a></li>
                        <li><a href="{{ route("post.index") }}"> Post </a></li>
                        <li><a href="post#add_post">Add Post </a></li>
                        {{-- <li><a href="forgot-password.html"> Forgot Password </a></li>
                        <li><a href="lock-screen.html"> Lock Screen </a></li> --}}
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-document"></i> <span>Product</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="{{ url('/product') }}"> Product </a></li>
                        <li><a href="{{ url('/product') }}"> Add Product </a></li>
                        <li><a href="post#add_post">Product Setting</a></li>
                        {{-- <li><a href="forgot-password.html"> Forgot Password </a></li>
                        <li><a href="lock-screen.html"> Lock Screen </a></li> --}}
                    </ul>
                </li>
                <li class="">
                    <a href="{{ route('setting_index') }}"><i class="fe fe-home"></i> <span>Settings</span></a>
                </li>
                <li class="submenu">
                    <a href=""><i class="fe fe-vector"></i> <span>Advance</span><span class="menu-arrow"></a>
                    <ul style="display: none;">
                        <li><a href="{{ route('slider') }}"> Sliders Gallary </a></li>
                        <li><a href="{{ route('slide_add') }}"> Add Slider </a></li>
                    </ul>
                </li>
                {{-- <li class="submenu">
                    <a href="#"><i class="fe fe-warning"></i> <span> Error Pages </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="error-404.html">404 Error </a></li>
                        <li><a href="error-500.html">500 Error </a></li>
                    </ul>
                </li>
                <li>
                    <a href="blank-page.html"><i class="fe fe-file"></i> <span>Blank Page</span></a>
                </li>
                <li class="menu-title">
                    <span>UI Interface</span>
                </li>
                <li>
                    <a href="components.html"><i class="fe fe-vector"></i> <span>Components</span></a>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-layout"></i> <span> Forms </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="form-basic-inputs.html">Basic Inputs </a></li>
                        <li><a href="form-input-groups.html">Input Groups </a></li>
                        <li><a href="form-horizontal.html">Horizontal Form </a></li>
                        <li><a href="form-vertical.html"> Vertical Form </a></li>
                        <li><a href="form-mask.html"> Form Mask </a></li>
                        <li><a href="form-validation.html"> Form Validation </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><i class="fe fe-table"></i> <span> Tables </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="tables-basic.html">Basic Tables </a></li>
                        <li><a href="data-tables.html">Data Table </a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="javascript:void(0);"><i class="fe fe-code"></i> <span>Multi Level</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li class="submenu">
                            <a href="javascript:void(0);"> <span>Level 1</span> <span class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a href="javascript:void(0);"><span>Level 2</span></a></li>
                                <li class="submenu">
                                    <a href="javascript:void(0);"> <span> Level 2</span> <span class="menu-arrow"></span></a>
                                    <ul style="display: none;">
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                        <li><a href="javascript:void(0);">Level 3</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0);"> <span>Level 2</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);"> <span>Level 1</span></a>
                        </li>
                    </ul>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
