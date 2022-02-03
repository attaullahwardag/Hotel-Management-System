@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $staff->full_name }}'s Payments History
                <a href="{{ url('admin/staff/payment/'.$staff_id.'/add') }}" class="btn btn-success float-right">Add new Payment</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success"> {{ Session('success') }}</p>
            @endif
            <div class="table-responsive">
                <div class="my-3 d">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Amount: </th>
                            <th>Payment Date: </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($data)
                            @foreach ($data as $d)
                                <tr>
                                    <td>{{ $d->amount }}</td>
                                    <td>{{ $d->payment_date }}</td>
                                    <td> <a class="btn btn-danger btn-sm" href="{{ url('admin/staff/payment/'.$d->id.'/'.$d->Staff_id.'/delete') }}"> <i class="fas fa-trash"></i> </a> </td>
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
@endsection