@extends('home')
@section('page_title')
    Update Employee's information
@endsection
@section('content')
    {{--    @include('layouts.core.navbar')--}}

    <div class="card mt-2">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <form method="post" action="{{route('employee.update',$employee->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$employee->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" value="{{$employee->address}}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{$employee->phone}}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{$employee->email}}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection




