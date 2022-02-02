@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Department
                <a href="{{ url('admin/department') }}" class="btn btn-success float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success"> {{ Session('success') }}</p>
            @endif
            <div class="table-responsive">
                <form method="POST" action="{{ url('admin/department') }}">
                    @csrf
                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th> Department Title: </th>
                            <td> <input type="text" name="title" id="" class="form-control"> </td>
                        </tr>
                        <tr>
                            <th> Department Detail: </th>
                            <td> <textarea class="form-control" name="detail" id="" cols="30" rows="5"></textarea></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" value="Save Record" class="form-control w-25 btn btn-primary"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection