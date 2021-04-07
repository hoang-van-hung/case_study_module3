@extends('layouts.core.home')
@section('page_title')
    Danh sach nguoi dung
@endsection
@section('content')
    <h1 class="mt-4">Users List</h1>

    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('users.create')}}" class="btn btn-success float-right m-3">ADD USER</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
{{--                        <th>Image</th>--}}
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
{{--                        <th>Image</th>--}}
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($users as $key => $user)
                        <tr>
                            <td>{{ $key + $users->firstItem() }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->roles as $role)
                                    {{ $role->name. ',' }}
                                @endforeach
                            </td>
{{--                            <td><img src="{{ asset('storage/' . $user->image) }}" width="150" alt=""></td>--}}
                            <td>
                                <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                <a onclick="return confirm('Are you sure delete user: {{ $user->name }}')"
                                   class="btn btn-danger" href="{{ route('users.delete', $user->id) }}"><i class="fas fa-trash"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                    <ul class="pagination justify-content-end">
                        <li class="page-item">{{ $users->links("pagination::bootstrap-4") }}</li>
                    </ul>


            </div>
        </div>
    </div>
@endsection
