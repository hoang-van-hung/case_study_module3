@extends('layouts.core.home')
@section('page_title')
    Danh sach san pham
@endsection
@section('content')
    <h1 class="mt-4">Roles List</h1>

    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('roles.create')}}" class="btn btn-success float-right m-3">ADD ROLE</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Stt</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Stt</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($roles as $key => $role)
                        <tr>
                            <td>{{ ++$key}}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->description }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('roles.delete',$role->id)}}"><i class="fas fa-pencil-alt"></i></a>
                                <a onclick="return confirm('Are you sure delete customer : {{ $role->name }}')"
                                   class="btn btn-danger" href="{{route('roles.edit',$role->id)}}"><i class="fas fa-trash"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <ul class="pagination justify-content-end">
{{--                    <li class="page-item">{{ $customers->links("pagination::bootstrap-4") }}</li>--}}
                </ul>


            </div>
        </div>
    </div>
@endsection



