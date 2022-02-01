@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Customer
                <a href="{{ url('admin/customer') }}" class="btn btn-success float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success"> {{ Session('success') }}</p>
            @endif
            <div class="table-responsive ">
                <form method="POST" enctype="multipart/form-data" action="{{ url('admin/customer') }}">
                    @csrf
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Full Name</th>
                            <td> <input type="text" name="full_name" id="" class="form-control" required> </td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td> <input type="email" name="email" class="form-control" required></td>
                        </tr>
                        <tr>
                            <th>Mobile</th>
                            <td> <input type="text" name="mobile" class="form-control" required></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td> <input type="file" name="photo" ></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td> <textarea name="address" class="form-control" id="address" cols="30" rows="5"></textarea></td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td><input type="submit" value="Submit" class="form-control btn btn-primary"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection