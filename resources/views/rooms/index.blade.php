@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rooms
                <a href="{{ url('admin/rooms/create') }}" class="btn btn-success float-right">Add New</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success"> {{ Session('success') }}</p>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Room Type</th>
                            <th>Room Details</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Room Type</th>
                            <th>Room Details</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @if ($data)
                            @foreach ($data as $d )
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->title }}</td>
                                    <td> @if($d->Roomtype) {{ $d->Roomtype->title }} @endif </td>
                                    <td> @if($d->Roomtype) {{ $d->Roomtype->detail }} @endif</td>
                                    <td>
                                        <a href="{{ url('admin/rooms/'.$d->id) }}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></a>
                                        <a href="{{ url('admin/rooms/'.$d->id).'/edit' }}" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                                        <a onClick="return confirm('Are you sure you want to delete?')" href="{{ url('admin/rooms/'.$d->id).'/delete'  }}" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
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