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
            <form method="post" action="{{route('customer.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') border-danger  @enderror">
                </div>
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control @error('address') border-danger  @enderror">
                </div>
                @error('address')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control @error('phone') border-danger  @enderror">
                </div>
                @error('phone')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') border-danger  @enderror">
                </div>
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection



