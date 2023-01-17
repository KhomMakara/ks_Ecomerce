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
                                <th>SubSUbCategory_Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subsubcategory as $key => $row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ @$row->category->category_name }}</td>
                                    <td>{{ @$row->subcategory->subcategory_name }}</td>
                                    <td>{{ $row->subsubcategory_name }}</td>
                                    <td>
                                        <a href="{{ route('subsubcategory.edit',$row->id) }}"
                                            class="btn btn-sm btn-primary rounded text-white">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                            <a href="{{ route('subsubcategory.delete',$row->id) }}" onclick="return(confirm('are you sure?'))"
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
                    <form action="{{ route('subsubcategory.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="category-name">Category_Name</label>
                            <select name="category_id" id="category_id" class="form-control" required >
                                <option value="" selected = "" disabled>Please Select Category</option>
                                @foreach ($category as $row)
                                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="subcategory-name">Sub_Sub_Category_Name</label>
                            <select name="subcategory_id" id="subcategory_id" class="form-control" required >
                                <option value="" selected = "" disabled>Please Select SubCategory</option>
                                
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="subcategory_name">SubCategory_Name</label>
                            <input type="text" class="form-control" name="subsubcategory_name" id="subsubcategory_name"
                                placeholder="Enter SubSubCategory name" required>
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
        $("#all_subsubcategory").addClass('active');

        //
        $('select[name="category_id"]').on('change',function(){
            var category_id = $(this).val();
           if(category_id){
                $.ajax({
                    type: 'GET',
                    url: '{{ url('/subsubCategory/category/ajax') }}/' + category_id,
                    success: function(data){
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(JSON.parse(data),function(key,value){
                            $('select[name="subcategory_id"]').append
                            ('<option value="'+ value.id +'">'+ value.subcategory_name +'</option>');
                        });
                    }
                });
           }
           else{
            alert('No Category On Selected');
           }
        })
</script>
@endsection
@endsection
