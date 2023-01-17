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
                                <th>Icon</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $key => $row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                        <span>
                                            <i class="{{ $row->category_icon }}"></i>
                                        </span>
                                    </td>
                                    <td>{{ $row->category_name }}</td>
                                    <td>
                                       
                                        <a href="{{ route('category.edit', $row->id) }}"
                                            class="btn btn-sm btn-primary rounded text-white">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                            <a href="{{ route('category.delete',$row->id) }}" onclick="return(confirm('are you sure?'))"
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
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="category-name">Name</label>
                            <input type="text" class="form-control" name="category_name" id="category_name"
                                placeholder="Enter Category Name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category-icon">Icon</label>
                            <input type="text" class="form-control" name="category_icon" id="category_icon"
                                placeholder="Enter Category Icon" required>
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

            $("#category").addClass('active open');
            $("#all_category").addClass('active');

            
    </script>
@endsection
