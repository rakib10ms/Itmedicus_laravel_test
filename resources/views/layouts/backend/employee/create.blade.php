@extends('layouts.backend.masterbackend')

@section('content')

<div class="card">
    <div class="card-header">
        <h2 class="">Add Employee</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <form action="{{route('employee.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">First Name</label>
                <input type="text" class="form-control" name="first_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Employee First Name">
                @error('first_name')
                <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Last Name</label>
                <input type="text" class="form-control" name="last_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Employee LastName">
                @error('last_name')
                <div class="error text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Company</label>

                <select class="form-select d-block" aria-label="Default select example" name="company_id" required="required">
                    <option value="">--Select Company--</option>
                    @foreach($all_companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach


                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Employee Email">
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Phone</label>
                <input type="text" class="form-control" name="phone" id="exampleInputPassword1" placeholder="Enter Employee Phone">
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection