@extends('layout')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="main mt-5 mb-5">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Staff Record
                        <a href="{{ url('admin/staff') }}" class="btn btn-success float-right"><i class="fas fa-eye"></i> View All</a>
                    </h6>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" enctype="multipart/form-data" action="{{ url('admin/staff/'.$data->id) }}">
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
                                <label>Department</label>
                                <select name="department_id" id="" class="form-control">
                                    <option value="{{ $data->department->id }}">{{ $data->department->title }}</option>
                                    @foreach ($department as $dp )
                                        <option value="{{ $dp->id }}">{{ $dp->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="file-upload-field border rounded p-1">
                                    <label>Staff Image</label>
                                    <input type="file" name="photo">
                                    <input type="hidden" name="prev_photo" value="{{ $data->photo }}">
                                    <img width="100px" src="{{ asset('storage/'.$data->photo) }}" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Bio</label>
                                    <textarea class="form-control" name="bio" id="" cols="30" rows="5">{{ $data->bio }}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Salary Type</label>
                                @if ($data->salary_type == 'daily')
                                    <input type="radio" name="salary_type" checked value="daily" id=""> Daily
                                    <input type="radio" name="salary_type" value="monthly" id=""> Monthly
                                @else
                                    <input type="radio" name="salary_type"  value="daily" id=""> Daily
                                    <input type="radio" name="salary_type" checked value="monthly" id=""> Monthly
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Salary Amount </label>
                                <input type="text" name="salary_amount" class="form-control" placeholder="Name" value="{{ $data->salary_amount }}">
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