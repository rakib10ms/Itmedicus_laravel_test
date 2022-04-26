@extends('layouts.backend.masterbackend')

@section('content')

<h1 class="display-5">Welcome <span class="text-primary"> {{Auth::user()->name}} ! </span></h1>
@endsection