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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($slides as $slide)
                                <tr>
                                    <td>{{ $slide->id }}</td>
                                    <td>
                                            {{ $slide->title }}
                                    </td>
                                    <td>
                                        <span>
                                            {{ $slide->description }}
                                        </span>
                                    </td>
                                    <td>
                                        <img src="{{ asset($slide->image) }}" width="80px"/>
                                    </td>
                                        <td>
                                            <a href="{{ route('slide.edit', $slide->id) }}"
                                                class="btn btn-sm btn-primary rounded text-white">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>

                                        <td>
                                            <a href="{{ route('slide.delete',$slide->id) }}" onclick="return(confirm('are you sure?'))"
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

                    <form action="{{ route('slide.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Input Slide Title" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image"
                                placeholder="Input Slide Image" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">description</label><br>
                            <textarea name="description" id="description" cols="43" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn rounded btn-primary btn-block text-white"><i
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

            $("#slide").addClass('active open');
            $("#all_slide").addClass('active');


    </script>
@endsection
