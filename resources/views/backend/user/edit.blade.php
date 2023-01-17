@extends('layouts.master')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card card-grey rounded">
                <div class="toolbox"></div>
                <div class="card-block">
                    <form action="{{ route('user.update',$users->id) }}" method="POST">
                        @csrf
                        <div class="head"><center><h4>Edit User</h4></center></div>
                        <div class="form-group mb-2">
                            <label for="slide_title">Name</label>
                            <input type="text" class="form-control" name="name" id="slide_title" value="{{ $users->name }}" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="slide_title">Password</label>
                            <input type="text" class="form-control" name="password" id="slide_title" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="slide_title">Email</label>
                            <input type="text" class="form-control" name="email" id="slide_title" value="{{ $users->email }}" required>
                        </div>
                        <div class="form-group mb-2">
                            <label for="slide_title">Contact</label>
                            <input type="text" class="form-control" name="phone" value="{{ $users->phone }}" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="category-icon">Image</label><br>
                            <input type="file" name="images" id="image" value="{{ $users->images }}" class="form-control">
                                <div class="img-thumbnail">
                                    <img class="old" width="40px"
                                        @if($users->images) 
                                        src="{{ asset('storage/user_images/' . $users->images) }}" class="card-img-top w-100" style="width:150px" 
                                        @endif
                                    />
                                </div>
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