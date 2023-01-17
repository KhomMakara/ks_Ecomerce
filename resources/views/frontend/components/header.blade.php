
<div class="container">
    <div class="yamm navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
        <div class="nav-bg-class">
            <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                <div class="nav-outer">
                    <ul class="nav navbar-nav">
                        <li class="active dropdown yamm-fw"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a> </li>
                        @php
                        $categories = \App\Models\Category::orderBy('category_name','asc')
                        ->offset(0)
                        ->limit(9)
                        ->get();
                        @endphp
                        @foreach($categories as $cate)

                        <li class="dropdown yamm mega-menu"> <a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">{{$cate->category_name}}</a>
                            @php
                            $subcategories = \App\Models\SubCategory::where('category_id',$cate->id)->get();
                            @endphp
                            <ul class="dropdown-menu container">
                                <li>
                                    <div class="yamm-content ">
                                        <div class="row">
                                            @foreach($subcategories as $subcate)
                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">
                                                <h2 class="title">{{$subcate->subcategory_name}}</h2>
                                                <!--sub_sub_category-->
                                                @php
                                                $subsubcategories = \App\Models\SubSubCategory::where('subcategory_id',$subcate->id)->get();
                                                @endphp
                                                @foreach($subsubcategories as $subsubcate)
                                                    <ul class="links">
                                                        <li><a href="#">{{$subsubcate->subsubcategory_name}}</a></li>
                                                    </ul>
                                                @endforeach

                                                <!--end sub_sub_category-->
                                            </div>
                                            @endforeach
                                            <!-- /.col -->
                                            <!-- /.yamm-content -->
                                        </div>

                                    </div>
                                </li>

                            </ul>

                        </li>
                        @endforeach
                    </ul>
                    <!-- /.navbar-nav -->
                    <div class="clearfix"></div>
                </div>
                <!-- /.nav-outer -->
            </div>
            <!-- /.navbar-collapse -->

        </div>
        <!-- /.nav-bg-class -->
    </div>
    <!-- /.navbar-default -->
</div>
