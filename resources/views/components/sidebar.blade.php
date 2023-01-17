<div class="sidebar-container">
    <div class="sidebar-header">
        <div class="brand">
            <div class="logo">
                <span class="l l1"></span>
                <span class="l l2"></span>
                <span class="l l3"></span>
                <span class="l l4"></span>
                <span class="l l5"></span>
            </div> Ecomerce Admin
        </div>
    </div>
    <nav class="menu">
        <ul class="sidebar-menu metismenu" id="sidebar-menu">
            <li class="">
                <a href="{{ route('admin.home') }}">
                    <i class="fa fa-home"></i> Dashboard </a>
            </li>
            <!--category-->
            <li id="category">
                <a href="">
                    <i class="fa fa-th-large"></i>Category <i class="fa arrow"></i>
                </a>
                <ul class="sidebar-nav">
                    <li id="all_category">
                        <a href="{{ route('category.index') }}"> All Category </a>
                    </li>
                    <li id="all_subcategory">
                        <a href="{{ route('subcategory.index') }}"> All Subcategory </a>
                    </li>
                    <li id="all_subsubcategory">
                        <a href="{{ route('subsubcategory.index') }}"> All SubSubCategory </a>
                    </li>
                </ul>
            </li>
            <!--end of category-->

            <!--brand-->
            <li id="brand">
                <a href="">
                    <i class="fa fa-th-large"></i>Brand <i class="fa arrow"></i>
                </a>
                <ul class="sidebar-nav">
                    <li id="all_brand">
                        <a href="{{ route('brand.index') }}"> All Brand </a>
                    </li>
                  
                </ul>
            </li>
            <!--end of brand -->

            <!--product-->
            <li id="product">
                <a href="">
                    <i class="fa fa-th-large"></i>Product <i class="fa arrow"></i>
                </a>
                <ul class="sidebar-nav">
                    <li id="all_product">
                        <a href="{{ route('product.index') }}"> All Product </a>
                    </li>
                    <li id="add_product">
                        <a href="{{ route('product.add') }}"> Add Product </a>
                    </li>
                </ul>
            </li>
            <!--end of product-->
            <li id="slide">
                <a href="{{ route('slide.index') }}">
                    <i class="fa fa-sliders"></i> Slide </a>
            </li>
            <li id="user">
                <a href="{{ route('user.index') }}">
                    <i class="fa fa-user-circle-o"></i>User<i class="fa arrow"></i>
                </a>
                <ul class="sidebar-nav">
                    <li>
                        <a href="{{ route('user.index') }}"> All User </a>
                    </li>
                    <li>
                        <a href="{{ route('user.create') }}"> Create User </a>
                    </li>
                </ul>
            </li>
         
        </ul>
    </nav>
</div>
