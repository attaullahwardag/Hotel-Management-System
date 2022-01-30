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
                <a href="{{ url('admin/roomtype/create') }}" class="btn btn-success float-right">Add New</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Room Title</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Room Title</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                               <a href="" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i></a>
                               <a href="" class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </a>
                               <a href="" class="btn btn-danger btn-sm"> <i class="fa fa-trash"></i> </a>
                            </td>
                        </tr>
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