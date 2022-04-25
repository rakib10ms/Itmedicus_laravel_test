@extends('layouts.backend.masterbackend')

@section('content')

<div class="card">
    <div class="card-header">
        <h2 class="">Add Company</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company Name">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Logo</label>
                <input type="file" class="form-control" id="exampleInputPassword1" >
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Website</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter website link">
            </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection