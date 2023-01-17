@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card card-grey">
                <div class="tolbox">
                  
                </div>
                <div class="card-block">
                    <table class="table table-striped table-sm" id="data_table">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brand as $key => $row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                       <img src="{{ asset('storage/brand_images/'.$row->brand_image) }}" width="40px">
                                    </td>
                                    <td>{{ $row->brand_name }}</td>
                                    <td>
                                        <a href="{{ route('brand.edit', $row->id) }}"
                                            class="btn btn-sm btn-primary rounded text-white">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                            <a href="{{ route('brand.delete',$row->id) }}" onclick="return(confirm('are you sure?'))"
                                             class="btn btn-danger rounded btn-sm text-white"><i
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
                    <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="brand-name">Name</label>
                            <input type="text" class="form-control" name="brand_name" id="brand_name"
                                placeholder="Enter brand Name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="brand-image">Image</label>
                            <input type="file" class="form-control" name="brand_image" id="brand_image"
                               required>
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
