@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
      
        <div class="col-md-6">
            <div class="card card-grey">
                <div class="toolbox"></div>
                <div class="card-block">
                    <form action="{{ route('subsubcategory.update',$subsubcategory->id) }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="category-name">Category_Name</label>
                            <select name="category_id" id="category_id" class="form-control" required >
                                <option value="" selected = "" disabled>Please Select Category</option>
                                @foreach ($category as $row)
                                    <option value="{{ $row->id }}"{{ $row->id == $subsubcategory->category_id?'selected':'' }}>{{ $row->category_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-2">
                            <label for="subcategory-name">Sub_Sub_Category_Name</label>
                            <select name="subcategory_id" id="subcategory_id" class="form-control" required >
                                <option value="" selected = "" disabled>Please Select SubCategory</option>
                                @foreach ($subcategory as $row)
                                <option value="{{ $row->id }}"{{ $row->id == $subsubcategory->subcategory_id?'selected':'' }}>{{ $row->subcategory_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="subcategory_name">SubCategory_Name</label>
                            <input type="text" class="form-control" name="subsubcategory_name" id="subsubcategory_name"
                                placeholder="Enter SubSubCategory name" value="{{ $subsubcategory->subsubcategory_name }}" required>
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
