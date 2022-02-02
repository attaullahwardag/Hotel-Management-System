@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"> Add Staff
                <a href="{{ url('admin/staff') }}" class="btn btn-success float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success"> {{ Session('success') }}</p>
            @endif
            <div class="table-responsive ">
                <form method="POST" enctype="multipart/form-data" action="{{ url('admin/staff') }}">
                    @csrf
                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Full Name <sup>*</sup> </th>
                            <td> <input type="text" name="full_name" id="" class="form-control" required> </td>
                        </tr>
                        <tr>
                            <th>Department <sup>*</sup>  </th>
                            <td>
                                <select name="department_id" id="" class="form-control">
                                    <option value="">--- Select ---</option>
                                    @foreach ($department as $dp )
                                        <option value="{{ $dp->id }}">{{ $dp->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td> <input type="file" name="photo" ></td>
                        </tr>
                        <tr>
                            <th>Bio</th>
                            <td> <textarea name="bio" class="form-control" id="address" cols="30" rows="5"></textarea></td>
                        </tr>
                        <tr>
                            <th> Salary Type</th>
                            <td> 
                                <input type="radio" name="salary_type" value="daily" id=""> Daily
                                <input type="radio" name="salary_type" value="monthly" id=""> Monthly
                            </td>
                        </tr>
                        <tr>
                            <th>Salary Amount</th>
                            <td> <input type="text" name="salary_amount" class="form-control" ></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td><input type="submit" value="Submit" class="form-control w-25 btn btn-primary"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection