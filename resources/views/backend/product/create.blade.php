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
                    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                    <!--row-->
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="brand" class="control-label">Brand <span class="text-danger">*</span></label>
                                <select name="brand_id" id="brand_id" required class="form-control">
                                    <option value="" selected=" " disabled>--choose brand--</option>
                                    @foreach ($brand as $b)
                                        <option value="{{ $b->id }}">{{ $b->brand_name }}</option>
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
                                        <option value="{{ $c->id }}">{{ $c->category_name }}</option>
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
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="product_name" class="control-label">Product_Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="product_name" id="product_name" class="form-control" required
                                    placeholder="Enter Product Name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="product_code" class="control-label">Product_Code <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="product_code" id="product_code" class="form-control" required
                                    placeholder="Enter Product Code">
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
                                    placeholder="Enter Product Quantity">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="tag" class="control-label">tag <span class="text-danger">*</span></label>
                                <input type="text" data-role="tagsinput" name="tags" class="form-control"
                                    placeholder="Please input Tag">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="size" class="control-label">size <span class="text-danger">*</span></label>
                                <input type="text" data-role="tagsinput" name="size" class="form-control"
                                    placeholder="Please input Size">
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
                                    placeholder="Please input Color">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="product_price" class="control-label">Selling Product Price <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="product_price" id="product_price" class="form-control"
                                    placeholder="Please input Product Price">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="product_discount" class="control-label">Product Discount <span
                                        class="text-danger">*</span></label>
                                <input type="number" name="product_discount" id="product_discount" class="form-control"
                                    placeholder="Please input Product Discount">
                            </div>
                        </div>

                    </div>
                    <!--end row-->

                    <!--start row-->

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="thumnbnail" class="control-label">Main Thumnbnail <span
                                        class="text-danger">*</span></label>
                                <input type="file" name="product_thumbnail" id="product_thumbnail"
                                    class="form-control" onchange="getUrl(this)" required>
                                <div class="my-2">
                                    <img src="" id="main_thumnb">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="multi_image" class="control-label">Multi Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" name="multi_images[]" id="multiimages" class="form-control"
                                    multiple required>
                            </div>
                            <div class="row" id="preview_img">

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
                                <textarea name="sort_des" id="editor" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="long_des" class="control-label">Long Description <span
                                        class="text-danger">*</span></label>
                                <textarea name="long_des" id="editor1" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <!--end row -->

                    <!--start row -->
                    <div class="row">
                       <div class="col-md-3">
                            <div class="form-group mb-2">
                                <label >
                                    <input class="checkbox" type="checkbox" name="special_deal" value="1">
                                    <span>Special Deal</span>
                                </label>
                            </div>  
                       </div>
                       <div class="col-md-3">
                        <div class="form-group mb-2">
                            <label >
                                <input class="checkbox" type="checkbox" name="feature" value="1">
                                <span>Feature</span>
                            </label>
                        </div>  
                       </div>
                       <div class="col-md-3">
                        <div class="form-group mb-2">
                            <label >
                                <input class="checkbox" type="checkbox" name="specail_offer" value="1">
                                <span>Specail_offer</span>
                            </label>
                        </div>
                       </div>
                       <div class="col-md-3">
                        <div class="form-group mb-2">
                            <label>
                                <input class="checkbox" type="checkbox" name="hot_deals" value="1">
                                <span>Hot_deals</span>
                            </label>
                        </div>
                       </div>
                    </div>
                    <!--end row -->
                    <button type="submit" class="btn btn-success text-white rounded"><i class="fa fa-save"></i> save</button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
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
        $('#multiimages').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window
                .Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target
                                        .result).width(80)
                                    .height(80); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    </script>
     <script type="text/javascript">
        // display main Thumnbnail
        function getUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $("#main_thumnb").attr('src', e.target.result).width(80).height(80);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor1' ) )
            .catch( error => {
                console.error( error );
            } );

            
    </script>
     <script type="text/javascript">
        $(document).ready(function() {
            $('#data_table').DataTable();
            });

            $("#product").addClass('active open');
            $("#all_product").addClass('active');
    </script>
@endsection
