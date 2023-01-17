@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-grey rounded">
                <div class="toolbox"></div>
                <div class="card-block">
                    <form action="{{ route('slide.update',$slides->id) }}" method="POST">
                        @csrf
                        <div class="head"><center><h4>Edit Data</h4></center></div>
                        <div class="form-group mb-2">
                            <label for="slide_title">Title</label>
                            <input type="text" class="form-control" name="title" id="slide_title"
                            placeholder="Enter Slide Title" value="{{ $slides->title }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category-icon">Image</label><br>
                            <input type="file" name="image" id="image" value="{{ $slides->image }}" class="form-control">
                                <div class="img-thumbnail">
                                    <img class="old" width="40px"
                                        @if($slides->image) 
                                        src="{{ asset('storage/slide_images/' . $slides->image) }}" class="card-img-top w-100" style="width:150px" 
                                        @endif
                                    />
                                </div>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label><br>
                            <textarea name="description" id="description" cols="70" rows="5">{{old('description', $slides->description)}}</textarea>
                        </div>
                      
                        <button type="submit" class="btn rounded btn-primary btn-block text-white"><i class="fa fa-save"></i> Save</button>
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

            $("#slide").addClass('active open');
            $("#all_slide").addClass('active');  
    </script>
@endsection