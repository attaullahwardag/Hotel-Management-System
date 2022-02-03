@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Make Booking
                <a href="{{ url('admin/rooms') }}" class="btn btn-success float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success"> {{ Session('success') }}</p>
            @endif
            <div class="table-responsive">
                <form method="POST" action="{{ url('admin/booking') }}">
                    @csrf
                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Customer <sup class="text-danger">*</sup></th>
                            <td> 
                                <select name="customer_id" id="" class="form-control">
                                    <option value="0">--- Select --- </option>
                                    @if ($data)
                                        @foreach ($data as $d)
                                            <option value="{{ $d->id }}">{{ $d->full_name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Checkin Date <sup class="text-danger">*</sup></th>
                            <td><input type="date" name="checkin_date" class="form-control checkin-date" ></td>
                        </tr>
                        <tr>
                            <th>Checkout Date <sup class="text-danger">*</sup></th>
                            <td><input type="date" name="checkout_date" class="form-control" ></td>
                        </tr>
                        <tr>
                            <th>Available Rooms <sup class="text-danger">*</sup></th>
                            <td> 
                                <select name="room_id" id="" class="form-control roomlist">
                                    
                               
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Children <sup class="text-danger">(under 10years) <sup>*</sup> </sup></th>
                            <td><input type="number" name="total_children" class="form-control"></td>
                        </tr>
                        <tr>
                            <th>Total Adults <sup class="text-danger">*</sup></th>
                            <td><input type="number" name="total_adults" class="form-control"></td>
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
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $(".checkin-date").on('blur',function(){
            var _checkin_date = $(this).val();
            //Ajax
            $.ajax({
                url:"{{ url('admin/booking/availavle-rooms') }}/"+_checkin_date,
                dataType:"json",
                beforeSend:function(){
                    $(".roomlist").html('<option> Loading....... </option>');
                },
                success:function(res){
                    var _html = "";
                    $.each(res.data,function(index,row){
                        _html+='<option value="'+row.id+'">'+row.title+"</option>";
                    });
                    $(".roomlist").html(_html);
                },
            });
        });
    });

</script>

@endsection
@endsection