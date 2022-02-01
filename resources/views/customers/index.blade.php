@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customers
                <a href="{{ url('admin/customer/create') }}" class="btn btn-success float-right">Add New</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success"> {{ Session('success') }}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Phone#</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Photo</th>
                            <th>Mobile#</th>
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if ($data)
                            @foreach ($data as $d )
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->full_name }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>{{ $d->photo }}</td>
                                    <td>{{ $d->mobile }}</td>
                                    <td>{{ $d->address }}</td>

                                    <td>
                                        <a href="{{ url('admin/customer/'.$d->id) }}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></a>
                                        <a href="{{ url('admin/customer/'.$d->id).'/edit' }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                        <a href="{{ url('admin/customer/'.$d->id).'/delete'  }}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@section('scripts')
    <!-- Page level plugins -->
    <script src="{{ asset('/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('/js/demo/datatables-demo.js') }}"></script>
@endsection

@endsection