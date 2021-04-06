@extends('layouts.core.home')
@section('page_title')
    Them khach hang
@endsection
@section('content')
    {{--    @include('layouts.core.navbar')--}}

    <div class="card ">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <form method="post" action="{{route('role.store')}}" enctype="multipart/form-data" style="width: 100%">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="card border-primary mb-3 col-md-12">
                    @foreach($permissionParent as $permission)
                        <div class="card-header">
                            <input type="checkbox" value="{{$permission->name}}" id="products">
                            <label for="products"> {{$permission->name}}</label>
                        </div>
                        <div class="row">


                            @foreach($permission->permissionChildrent as $permissionChildrenItem)
                                <div class="card-body text-primary  col col-md-3">
                                    <h5 class="card-title">
                                        <input type="checkbox" name="permission_id[]" value="{{$permissionChildrenItem->id}}" id="{{$permissionChildrenItem->id}}">
                                        <label for="{{$permissionChildrenItem->id}}">{{$permissionChildrenItem->name }} </label>

                                    </h5>
                                </div>
                            @endforeach
                        </div>
                </div>
                @endforeach
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection




