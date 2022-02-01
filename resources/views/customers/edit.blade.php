@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="main mt-5 mb-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Customer
                        <a href="{{ url('admin/customer') }}" class="btn btn-success float-right"><i class="fas fa-eye"></i> View All</a>
                    </h6>
                </div>
                <form method="POST" enctype="multipart/form-data" action="{{ url('admin/customer/'.$data->id) }}">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        @if (Session::has('success'))
                            <p class="text-success"> {{ Session('success') }}</p>
                        @endif                            
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="full_name" class="form-control" placeholder="Name" value="{{ $data->full_name }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $data->email }}">
                            </div>
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" class="form-control" placeholder="Email" value="{{ $data->mobile }}">
                            </div>
                            <div class="form-group">
                                <div class="file-upload-field border rounded p-1">
                                    <label>Customer Image</label>
                                    <input type="file" name="photo">
                                    <input type="hidden" name="prev_photo" value="{{ $data->photo }}">
                                    <img width="100px" src="{{ asset('storage/'.$data->photo) }}" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Adress</label>
                                    <textarea class="form-control" name="address" id="" cols="30" rows="5">{{ $data->address }}
                                </textarea>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-fill btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <a href="#">
                            <img class="img-thumbnail rounded-circle" src="{{ asset('storage/'.$data->photo) }}" alt="">
                        </a>
                    </p>
                </div> 
            </div>
        </div>
    </div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection