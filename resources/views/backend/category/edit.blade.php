@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
      
        <div class="col-md-6">
            <div class="card card-grey rounded">
                <div class="toolbox"></div>
                <div class="card-block">
                    <form action="{{ route('category.update',$category->id) }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="category-name">Name</label>
                            <input type="text" class="form-control" name="category_name" id="category_name"
                            placeholder="Enter Category Name" value="{{ $category->category_name }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category-icon">Icon</label>
                            <input type="text" class="form-control" name="category_icon" id="category_icon"
                            placeholder="Enter Category Icon" value="{{ $category->category_icon }}"  required>
                        </div>
                        <button type="submit" class="btn rounded btn-success btn-block text-white"><i class="fa fa-save"></i> Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
           
            });

            $("#category").addClass('active open');
            $("#all_category").addClass('active');  
    </script>
@endsection