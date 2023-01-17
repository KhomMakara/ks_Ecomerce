@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-grey">
                <div class="toolbox"></div>
                <div class="card-block">
                    <form action="{{ route('brand.update',$brand->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="brand-name">Name</label>
                            <input type="text" class="form-control" name="brand_name" id="brand_name"
                                placeholder="Enter brand Name" value="{{ $brand->brand_name }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="brand-image">Image</label>
                            <input type="file" class="form-control" name="brand_image" id="brand_image"
                               >
                        </div>
                        <div class="my-2">
                            <img src="{{ asset('storage/brand_images/'.$brand->brand_image) }}" width="150px">
                        </div>
                        <button type="submit" class="btn rounded btn-success btn-block text-white"><i
                                class="fa fa-save"></i> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data_table').DataTable();
            });
            $("#brand").addClass('active open');
            $("#all_brand").addClass('active');
    </script>
@endsection
