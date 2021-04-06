@extends('layouts.core.home')
@section('page_title')
    Them khach hang
@endsection
@section('content')
    {{--    @include('layouts.core.navbar')--}}

    <div class="card mt-2">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <form method="post" action="{{route('customer.update',$customer->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{$customer->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" value="{{$customer->address}}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="{{$customer->phone}}" class="form-control">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="{{$customer->email}}" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection




