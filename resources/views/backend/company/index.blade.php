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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Contact</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->id }}</td>
                                    <td>
                                            {{ $company->name }}
                                    </td>
                                    <td>
                                            {{ $company->email }}
                                    </td>
                                    <td>
                                        {{ $company->address }}
                                    </td>
                                    <td>
                                        {{ $company->contact }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('storage/company_images/' . $company->image) }}" width="40px"/>
                                    </td>
                                        <td> 
                                            <a href="{{ route('company.edit', $company->id) }}"
                                                class="btn btn-sm btn-primary rounded text-white">
                                                <i class="fa fa-edit"></i>
                                            </a> 
                                        </td>

                                        <td>
                                            <a href="{{ route('company.delete',$company->id) }}" onclick="return(confirm('are you sure?'))"
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
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#data_table').DataTable();
            });

            $("#company").addClass('active open');
            $("#all_company").addClass('active');        
    </script>
@endsection
