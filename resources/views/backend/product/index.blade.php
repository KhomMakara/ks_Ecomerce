@extends('layouts.master')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-grey">
                <div class="tolbox">
                </div>
                <div class="card-block">
                    <table class="table table-striped table-sm" id="data_table">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Product Quantity</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($product as $key => $row)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>
                                       <img src="{{ asset($row->product_thumbnail) }}" width="70px" height="70px">
                                    </td>
                                    <td>{{ $row->product_name }}</td>
                                    <td>{{ $row->product_qty }}</td>
                                    <td>
                                        <a href="{{ route('product.edit',$row->id) }}"
                                            class="btn btn-sm btn-primary rounded text-white">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                            <a href="{{ route('product.delete',$row->id) }}" onclick="return(confirm('are you sure?'))"
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

    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data_table').DataTable();
            });

            $("#product").addClass('active open');
            $("#all_product").addClass('active');
    </script>
@endsection
