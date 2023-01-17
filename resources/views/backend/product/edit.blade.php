@extends('layouts.master')
@section('css')
    <style type="text/css">
        .bootstrap-tagsinput {
            width: 100%;
        }

        .label-info {
            background-color: #17a2b8;

        }

        .label {
            display: inline-block;
            padding: .25em .4em;
            font-size: 75%;
            font-weight: 700;
            line-height: 1;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: .25rem;
            transition: color .15s ease-in-out, background-color .15s ease-in-out,
                border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
    </style>
@endsection
@section('content')
    <div class="card card-grey">
        <div class="boxtool"> </div>
        <div class="row">
            <div class="col-12">
                <div class="card-block rounded">
                    <div class="card-title">
                        <h3 id="test"></h3>
                        <hr>
                    </div>
                    <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!--row-->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="brand" class="control-label">Brand <span
                                            class="text-danger">*</span></label>
                                    <select name="brand_id" id="brand_id" required class="form-control">
                                        <option value="" selected=" " disabled>--choose brand--</option>
                                        @foreach ($brand as $b)
                                            <option value="{{ $b->id }}"
                                                {{ $b->id == $product->brand_id ? 'selected' : '' }}>{{ $b->brand_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="category_id" class="control-label">Category_id <span
                                            class="text-danger">*</span></label>
                                    <select name="category_id" id="category_id" required class="form-control">
                                        <option value="" selected=" " disabled>--choose category--</option>
                                        @foreach ($category as $c)
                                            <option value="{{ $c->id }}"
                                                {{ $c->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $c->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="subcategory_id" class="control-label">Subcategory_id <span
                                            class="text-danger">*</span></label>
                                    <select name="subcategory_id" id="subcategory_id" required class="form-control">
                                        <option value="" selected=" " disabled>--choose Subcategory--</option>
                                        @foreach ($subcategory as $sub)
                                            <option value="{{ $sub->id }}"
                                                {{ $sub->id == $product->subcategory_id ? 'selected' : '' }}>
                                                {{ $sub->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!--end row-->

                        <!--start row-->
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="subsubcategory_id" class="control-label">Sub-SubCategory_id <span
                                            class="text-danger">*</span></label>
                                    <select name="subsubcategory_id" id="subsubcategory_id" required class="form-control">
                                        <option value="" selected=" " disabled>--choose Sub-SubCategory--</option>
                                        @foreach ($subsubcategory as $subsub)
                                            <option value="{{ $subsub->id }}"
                                                {{ $subsub->id == $product->subsubcategory_id ? 'selected' : '' }}>
                                                {{ $subsub->subsubcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="product_name" class="control-label">Product_Name <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="product_name" id="product_name" class="form-control"
                                        value="{{ $product->product_name }}" required placeholder="Enter Product Name">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="product_code" class="control-label">Product_Code <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="product_code" id="product_code" class="form-control"
                                        required value="{{ $product->product_code }}" placeholder="Enter Product Code">
                                </div>
                            </div>

                        </div>
                        <!--end row-->


                        <!--start row-->
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="product_qty" class="control-label">product_qty <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="product_qty" id="product_qty" class="form-control" required
                                        value="{{ $product->product_qty }}" placeholder="Enter Product Quantity">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="tag" class="control-label">tag <span
                                            class="text-danger">*</span></label>
                                    <input type="text" data-role="tagsinput" name="tags" class="form-control"
                                        value="{{ $product->product_tag }}" placeholder="Please input Tag">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="size" class="control-label">size <span
                                            class="text-danger">*</span></label>
                                    <input type="text" data-role="tagsinput" name="size" class="form-control"
                                        value="{{ $product->product_size }}" placeholder="Please input Size">
                                </div>
                            </div>

                        </div>
                        <!--end row-->

                        <!--start row -->
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="color" class="control-label">color <span
                                            class="text-danger">*</span></label>
                                    <input type="text" data-role="tagsinput" name="color" class="form-control"
                                        value="{{ $product->product_color }}" placeholder="Please input Color">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="product_price" class="control-label">Selling Product Price <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="product_price" id="product_price" class="form-control"
                                        value="{{ number_format($product->product_price, 2) }}"
                                        placeholder="Please input Product Price">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="product_discount" class="control-label">Product Discount <span
                                            class="text-danger">*</span></label>
                                    <input type="number" name="product_discount" id="product_discount"
                                        class="form-control" value="{{ $product->discount_price }}"
                                        placeholder="Please input Product Discount">
                                </div>
                            </div>

                        </div>
                        <!--end row-->

                        <!--start row -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="sort_desc" class="control-label">Sort Description <span
                                            class="text-danger">*</span></label>
                                    <textarea name="sort_des" id="editor" cols="30" rows="10" class="form-control">
                                    {{ $product->short_des }}
                                </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="long_des" class="control-label">Long Description <span
                                            class="text-danger">*</span></label>
                                    <textarea name="long_des" id="editor1" cols="30" rows="10" class="form-control">
                                    {{ $product->long_des }}
                                </textarea>
                                </div>
                            </div>
                        </div>
                        <!--end row -->

                        <!--start row -->
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label>
                                        <input class="checkbox" type="checkbox" name="special_deal"
                                            {{ $product->special_deals == 1 ? 'checked' : '' }} value="1">
                                        <span>Special Deal</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label>
                                        <input class="checkbox" type="checkbox" name="feature"
                                            {{ $product->features == 1 ? 'checked' : '' }} value="1">
                                        <span>Feature</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label>
                                        <input class="checkbox" type="checkbox" name="specail_offer"
                                            {{ $product->specail_offer == 1 ? 'checked' : '' }} value="1">
                                        <span>Specail_offer</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group mb-2">
                                    <label>
                                        <input class="checkbox" type="checkbox"
                                            {{ $product->hot_deals == 1 ? 'checked' : '' }} name="hot_deals"
                                            value="1">

                                        <span>Hot_deals</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!--end row -->
                        <button type="submit" class="btn btn-success text-white rounded"><i class="fa fa-save"></i>
                            save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- image edit -->

    <div class="card carg-grey">
        <div class="toolbox"></div>
        <form action="{{ route('product.update_thumnbnail', $product->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4 mx-3">
                    <h4>Thumnbnail Image</h4>
                    <div class="card shadow" style="width: 16rem;">
                        <div class="card-title p-2">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                        </div>
                        <img src="{{ asset($product->product_thumbnail) }}" id="preview" class="card-img-top">
                        <div class="card-body">

                            <a href="#" class="btn btn-danger btn-oval"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>

                    <div class="form-group my-2">
                        <label for="">Update Image</label>
                        <input type="file" name="product_thumnbnail" onchange="getUrl(this)" id="product_thumnbnail"
                            class="form-control">
                    </div>

                    <button class="btn btn-primary" type="submit">Update Image</button>
                </div>
            </div>
        </form>
    </div>


    <!-- row -->
    <div class="card card-grey">
        <div class="toolbox"></div>

        <div class="col-12">
            <h4>Multiple Image <span class="text-danger">*</span></h4>

            <form action="{{ route('product.update.multi') }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="row">
                    @foreach ($multi as $mul)
                        <div class="col-md-3">
                            <input type="hidden" name="preview_mul" id="preview_mul" value="{{ $mul->id }}">
                            <div class="card shadow" style="width: 16rem;">
                                <div class="card-title p-2">

                                </div>
                                <img src="{{ asset($mul->image_name) }}" id="preview_mul{{ $mul->id }}"
                                    class="card-img-top">
                                <div class="card-body">

                                    <button type="button" data-id="{{ $mul->id }}" class="show_confirm">
                                        delete</button>
                                </div>
                            </div>
                            <div class="form-group my-2">
                                <label for="">Update Mutiple Image</label>
                                <input type="file" name="multi[{{ $mul->id }}]" id="product_multiple"
                                    class="form-control">
                            </div>
                            <button class="btn btn-primary" type="submit">Update Multiple Image</button>

                        </div>
                    @endforeach
                </div>
            </form>

        </div>
    </div>
    <!--end -->
@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.show_confirm').click(function(event) {


            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).data('id');

                    $.ajax({
                        type: 'POST',
                        data: {
                            "_token": $('meta[name="csrf-token"]').attr('content'),
                            "id": id
                        },
                        url: '{{ url('product/delete/product/multi') }}',
                        dataType: 'json',
                        success: function(data) {
                            window.location.href ='{{route('product.view')}}';
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    })

                }
            })
        });
    </script>
    <script type="text/javascript">
        function getUrl(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#preview").attr('src', e.target.result);

                }
                reader.readAsDataURL(input.files[0]);
            }
        }


        $(document).ready(function() {

            //ajax to get subcategory by category_id
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                  
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('/product/getsubcategory/ajax') }}/' + category_id,
                        success: function(data) {
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(JSON.parse(data), function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>');
                            });
                        }
                    });
                }
            });

            //ajax to get sub-sub-category by subcategory_id
            $('select[name="subcategory_id"]').on('change', function() {
                var subcategory_id = $(this).val();

                if (subcategory_id) {
                    $.ajax({
                        type: 'GET',
                        url: '{{ url('/product/getsubsubcategory/ajax') }}/' + subcategory_id,
                        success: function(data) {
                            var d = $('select[name="subsubcategory_id"]').empty();

                            $.each(JSON.parse(data), function(key, value) {
                                $('select[name="subsubcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subsubcategory_name + '</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>


    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor1'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data_table').DataTable();
        });

        $("#product").addClass('active open');
        $("#all_product").addClass('active');
    </script>
@endsection
