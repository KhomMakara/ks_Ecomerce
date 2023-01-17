@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-grey">
                <div class="toolbox"></div>
                <div class="card-block">
                    <form action="{{ route('subcategory.update',$subcategory->id) }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="category-name">Name</label>
                            <select name="category_id" id="category_id" class="form-control" required >
                                <option value="" selected = "" disabled>Please Select Category</option>
                                @foreach ($category as $row)
                                    <option value="{{ $row->id }}" {{ $row->id == $subcategory->category_id?'selected':'' }}>{{ $row->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="subcategory_name">SubCategory_Name</label>
                            <input type="text" class="form-control" name="subcategory_name" id="subcategory_name"
                                placeholder="Enter SubCategory name" value="{{ $subcategory->subcategory_name }}" required>
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
        $("#category").addClass('active open');
        $("#all_subcategory").addClass('active');  
    </script>
@endsection
