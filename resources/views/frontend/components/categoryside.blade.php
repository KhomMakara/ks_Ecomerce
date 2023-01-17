<nav class="yamm megamenu-horizontal">
    <ul class="nav">

        @php
        $categories = \App\Models\Category::limit(8)->get();
        @endphp

        @foreach($categories as $cate)
      <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="{{$cate->category_icon}}" aria-hidden="true"></i>

         {{$cate->category_name}}
          </a>
        <ul class="dropdown-menu mega-menu">
          <li class="yamm-content">
            <div class="row">
                @php
                $subcategories = \App\Models\SubCategory::where('category_id',$cate->id)->get();
                @endphp
                @foreach($subcategories as $subcate)
              <div class="col-sm-12 col-md-3">
                  @php
                  $subsubcategories = \App\Models\SubSubCategory::where('subcategory_id',$subcate->id)->get();
                  @endphp
                  @foreach($subsubcategories as $subsubcate)
                    <ul class="links list-unstyled">
                  <li><a href="#">{{$subsubcate->subsubcategory_name}}</a></li>

                </ul>
                  @endforeach
              </div>
                @endforeach

            </div>
            <!-- /.row -->
          </li>
          <!-- /.yamm-content -->
        </ul>
        <!-- /.dropdown-menu --> </li>
        @endforeach
      <!-- /.menu-item -->




    </ul>
    <!-- /.nav -->
  </nav>
