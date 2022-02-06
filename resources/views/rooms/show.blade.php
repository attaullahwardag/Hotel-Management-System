@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Rooms</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room
                <a href="{{ url('admin/rooms') }}" class="btn btn-success float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Title</th>
                            <th> Room Type </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $room->id }}</td>
                            <td> {{ $room->title }} </td>
                            <td> {{ $room->Roomtype->title }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection
