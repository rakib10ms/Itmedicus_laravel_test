@extends('layouts.backend.masterbackend')

@section('content')

<div class="card">
    <div class="card-header">
        <h2 class="">Add Company</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company Name">
                @error('name')
                <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Logo</label>
                <input type="file" class="form-control" name="logo" id="exampleInputPassword1">
                @error('logo')
                <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Website</label>
                <input type="text" class="form-control" name="website" id="exampleInputPassword1" placeholder="Enter website link">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection