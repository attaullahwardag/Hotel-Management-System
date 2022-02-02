@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $data->title }} <sup>(Rooms Type)</sup>
                <a href="{{ url('admin/roomtype') }}" class="btn btn-success float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive ">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th> Title</th>  
                            <th> price</th>  
                            <th> Details </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td> {{ $data->title }} </td>
                            <td> {{ $data->price }} </td>
                            <td>{{ $data->detail }}</td>
                        </tr>
                        <tr>
                            <table>
                                <tr>
                                    @foreach ($data->roomtypeimages as $img )
                                        <td class="imgcol{{ $img->id }}"> 
                                            <img width="80px" src="{{ asset('storage/'.$img->img_src) }}" alt="" srcset="">
                                            <p><button type="button" onclick="return confirm('Are you sure you want to delete the image?')" class="btn btn-danger btn-sm w-100 mt-1 delete-image" data-image-id="{{ $img->id }}"><i class="fas fa-trash"></i></button></p>
                                        </td>
                                    @endforeach
                                </tr>
                            </table>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection