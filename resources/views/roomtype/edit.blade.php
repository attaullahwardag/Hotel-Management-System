@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
   
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Room Types
                <a href="{{ url('admin/roomtype') }}" class="btn btn-success float-right">View All</a>
            </h6>
        </div>
        <div class="card-body">
            @if (Session::has('success'))
                <p class="text-success"> {{ Session('success') }}</p>
            @endif
            <div class="table-responsive ">
                <form method="POST" action="{{ url('admin/roomtype/'.$data->id) }}">
                    @csrf
                    @method('put')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tr>
                            <th>Title</th>
                            <td> <input type="text" value="{{ $data->title }}" name="title" id="" class="form-control"> </td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td> <input type="number" value="{{ $data->price }}" name="price" id="" class="form-control"> </td>
                        </tr>
                        <tr>
                            <th>Gallery</th>
                            <td>
                                <table>
                                    <tr>
                                        @foreach ($data->roomtypeimages as $img )
                                            <td class="imgcol{{ $img->id }}"> 
                                                <img width="80px" src="{{ asset('storage/'.$img->img_src) }}" alt="" srcset="">
                                                <p><button type="button" onclick="return confirm('Are you sure you want to delete the image?')" class="btn btn-danger btn-sm mt-1 w-100 delete-image" data-image-id="{{ $img->id }}"><i class="fas fa-trash"></i></button></p>
                                            </td>
                                        @endforeach
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <th>Details</th>
                            <td><textarea name="detail" id="" cols="30" rows="5" class="form-control">{{ $data->detail }}</textarea></td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td><input type="submit" value="Submit" class="form-control btn btn-primary"></td>
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
        $(".delete-image").on('click', function(){
            var img_id = $(this).attr('data-image-id');
            var btn = $(this);
            $.ajax({
                url:"{{ url('admin/roomtypeimage/delete') }}/"+img_id,
                dataType:'json',
                beforeSend:function(){
                    btn.addClass('disabled');
                },
                success:function(res){
                    console.log(res);
                    $(".imgcol"+img_id).remove();
                    btn.removeClass('disabled');
                }
            });
        });
    });
</script>
@endsection
@endsection