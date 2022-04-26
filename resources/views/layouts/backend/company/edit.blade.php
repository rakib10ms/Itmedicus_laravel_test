@extends('layouts.backend.masterbackend')

@section('content')

<div class="card">
    <div class="card-header">
        <h2 class="">Edit Company</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{route('company.update',$edit_company->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" name="name" value="{{$edit_company->name}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company Name">
                @error('name')
                <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" value="{{$edit_company->email}}"id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Logo</label>
                <img src="{{ url('storage/'.$edit_company->logo) }}" style="width:100px;height:50px;display:block" class="mt-2 mb-2"alt="asd" />
                <input type="file" class="form-control" name="logo" value="{{$edit_company->logo}}" id="exampleInputPassword1">
                @error('logo')
                <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Website</label>
                <input type="text" class="form-control" name="website" value="{{$edit_company->website}}" id="exampleInputPassword1" placeholder="Enter website link">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection