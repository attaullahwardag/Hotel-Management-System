@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Staff Payment
                <a href="{{ url('admin/staff') }}" class="btn btn-success float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success"> {{ Session('success') }}</p>
            @endif
            <div class="table-responsive">
                <form method="POST" action="{{ url('admin/staff/payment/'.$staff_id) }}">
                    @csrf
                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Amount: </th>
                            <td> <input type="text" name="amount" id="" class="form-control"> </td>
                        </tr>
                        <tr>
                            <th>Payment Date: </th>
                            <td> <input type="date" name="payment_date" id="" class="form-control"> </td>
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