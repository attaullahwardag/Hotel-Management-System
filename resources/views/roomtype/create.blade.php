@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Roomtype</h1>
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room Types
                <a href="{{ url('admin/roomtype') }}" class="btn btn-success float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>Title</th>
                        <td> <input type="text" name="title" id="" class="form-control"> </td>
                    </tr>
                    <tr>
                        <th>Details</th>
                        <td><textarea name="details" id="" cols="30" rows="10" class="form-control"></textarea></td>
                    </tr>
                        <th>Action</th>
                        <td><input type="submit" value="Submit" class="form-control btn btn-primary"></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection