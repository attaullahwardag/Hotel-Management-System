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
                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Full Name <sup>*</sup> </th>
                            <td> <input type="text" name="full_name" id="" class="form-control" required> </td>
                        </tr>
                        <tr>
                            <th>Email <sup>*</sup>  </th>
                            <td> <input type="email" name="email" class="form-control" required></td>
                        </tr>
                        <tr>
                            <th>Mobile <sup>*</sup> </th>
                            <td> <input type="text" name="mobile" class="form-control" required></td>
                        </tr>
                        <tr>
                            <th>Photo</th>
                            <td> 
                                <div class="d-flex border rounded justify-content-between h-50 ">
                                    <input  class="my-auto ml-2" type="file" name="photo"  onchange="loadFile(event)" > 
                                    <img id="output" width="60px" class="rounded m-2" height="60" />
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td> <textarea name="address" class="form-control" id="address" cols="30" rows="5"></textarea></td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td><input type="submit" value="Submit" class="form-control btn w-25 btn-primary"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@section('scripts')
    <script type="text/javascript">
        var image = document.getElementById('output');
            image.src = "{{ asset('img/noimg.jpeg') }}"
        var loadFile = function(event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0]);
           
        };
    </script>
@endsection
@endsection