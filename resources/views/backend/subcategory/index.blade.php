@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-grey">
                <div class="toolbox"></div>
                <div class="card-block">
                    <table class="table table-striped table-sm" id="data_table">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Category_Name</th>
                                <th>SubCategory_Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategory as $key => $row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $row->category->category_name }}</td>
                                    <td>{{ $row->subcategory_name }}</td>
                                    <td>
                                       
                                        <a href="{{ route('subcategory.edit', $row->id) }}"
                                            class="btn btn-sm btn-primary rounded text-white">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                            <a href="{{ route('subcategory.delete',$row->id) }}" onclick="return(confirm('are you sure?'))"
                                                id="btn_trash" class="btn btn-danger rounded btn-sm text-white"><i
                                                class="fa fa-trash"></i>
                                             </a>
                                        </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-grey">
                <div class="toolbox"></div>
                <div class="card-block">
                    <form action="{{ route('subcategory.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="category-name">Name</label>
                            <select name="category_id" id="category_id" class="form-control" required >
                                <option value="" selected = "" disabled>Please Select Category</option>
                                @foreach ($category as $row)
                                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="subcategory_name">SubCategory_Name</label>
                            <input type="text" class="form-control" name="subcategory_name" id="subcategory_name"
                                placeholder="Enter SubCategory name" required>
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
   
@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        $('#data_table').DataTable();
      
        });

        $("#category").addClass('active open');
        $("#all_subcategory").addClass('active');

        
</script>
@endsection
@endsection
