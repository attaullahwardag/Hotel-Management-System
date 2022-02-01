@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room Types
                <a href="{{ url('admin/roomtype') }}" class="btn btn-success float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Title</th>  
                            <th> Details </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td> {{ $data->title }} </td>
                            <td>{{ $data->detail }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection