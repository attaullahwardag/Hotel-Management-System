@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Staff Details
                <a href="{{ url('admin/staff') }}" class="btn btn-success float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th> Staff id:</th>
                            <td>{{ $data->id }}</td>
                        </tr>
                        <tr>
                            <th>Name:</th>
                            <td> {{ $data->full_name }} </td>
                        </tr>
                        <tr>
                            <th>Department:</th>
                            <td> {{ $data->department->title }} </td>
                        </tr>
                        <tr>
                            <th>Staff Picture:</th>
                            <td><img width="200px" src="{{ asset('storage/'.$data->photo) }}" alt=""></td>
                        </tr>
                        <tr>
                            <th>Bio:</th>
                            <td>{{ $data->bio }}</td>
                        </tr>
                        <tr>
                            <th>Salary Type:</th>
                            <td>{{ $data->salary_type }}</td>
                        </tr>
                        <tr>
                            <th>Salary Amount:</th>
                            <td>{{ $data->salary_amount }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection