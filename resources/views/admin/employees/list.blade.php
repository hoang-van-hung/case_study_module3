@extends('home')
@section('page_title')
    Danh sach san pham
@endsection
@section('content')
    <h2 class="mt-4">Employee List</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
            DataTable
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($employees as $key => $employee)
                        <tr>
                            <td>{{ $key + $employees->firstItem()}}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->email }}</td>
                            <td><img src="{{ asset('storage/' . $employee->image) }}" width="100" height="100" alt=""></td>
                            <td>
                                <a class="btn btn-primary" href="{{route('employee.edit',$employee->id)}}">Edit</a>
                                <a onclick="return confirm('Are you sure delete customer : {{ $employee->name }}')"
                                   class="btn btn-danger" href="{{route('employee.delete',$employee->id)}}">Delete</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <ul class="pagination justify-content-end">
                    <li class="page-item">{{ $employees->links("pagination::bootstrap-4") }}</li>
                </ul>


            </div>
        </div>
    </div>
@endsection



