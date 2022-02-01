@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customer Details
                <a href="{{ url('admin/customer') }}" class="btn btn-success float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <td> Customer id:</td>
                            <td>{{ $data->id }}</td>
                        </tr>
                        <tr>
                            <td>Customer Name:</td>
                            <td> {{ $data->full_name }} </td>
                        </tr>
                        <tr>
                            <td>Customer Picture:</td>
                            <td><img width="200px" src="{{ asset('storage/'.$data->photo) }}" alt=""></td>
                        </tr>
                        <tr>
                            <td>Customer Email:</td>
                            <td>{{ $data->email }}</td>
                        </tr>
                        <tr>
                            <td>Customer Mobile#:</td>
                            <td>{{ $data->mobile }}</td>
                        </tr>
                        <tr>
                            <td>Customer Adress:</td>
                            <td>{{ $data->address }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection