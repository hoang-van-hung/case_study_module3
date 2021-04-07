@extends('layouts.core.home')
@section('page_title')
    Danh sach nguoi dung
@endsection
@section('content')
    <div class="card mt-2">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('users.edit', $user->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" value="{{ $user->email }}" name="email" class="form-control" disabled>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select class="custom-select" name="role" id="inputGroupSelect01">
                        @foreach($roles as $role)
                            <option
                                {{$user->checkRoles($role->id) ? 'checked': ''}}
                                value="{{$role->id}}" name="role_id[{{$role->id}}]" >{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">Role</div>
                    <div class="col-sm-10">
                        @foreach($roles as $role)
                            <div class="form-check">
                                <input
                                    {{$user->checkRoles($role->id) ? 'checked': ''}}
                                    value="{{ $role->id }}" name="role_id[{{$role->id}}]" class="form-check-input" type="checkbox" id="gridCheck-{{$role->id}}">
                                <label class="form-check-label" for="gridCheck-{{$role->id}}">
                                    {{ $role->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
<!--                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                </div>-->
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

