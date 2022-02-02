@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Rooms
                <a href="{{ url('admin/rooms') }}" class="btn btn-success float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success"> {{ Session('success') }}</p>
            @endif
            <div class="table-responsive">
                <form method="POST" action="{{ url('admin/rooms/'.$data->id) }}">
                    @csrf
                    @method('put')
                    <table class="table table-borderless" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Title</th>
                            <td> <input type="text" value="{{ $data->title }}" name="title" id="" class="form-control"> </td>
                        </tr>
                        <tr>
                            <th>Room Type: </th>
                            <td>
                                <select name="roomtype" id="" class="form-control">
                                    <option value="0">---Select---</option>
                                    @foreach ($roomtypes as $rt )
                                        <option @if ($data->room_type_id == $rt->id)
                                          selected  @endif value="{{ $rt->id }}">{{ $rt->title }}</option>
                                    @endforeach
                                </select>
                            </td>
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