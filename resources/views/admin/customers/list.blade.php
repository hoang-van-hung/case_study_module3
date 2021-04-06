@extends('layouts.core.home')
@section('page_title')
    Danh sach san pham
@endsection
@section('content')
    <h1 class="mt-4">Customers List</h1>
    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('customer.create')}}" class="btn btn-success float-right m-3">ADD CUSTOMER</a>
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
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($customers as $key => $customer)
                        <tr>
                            <td>{{ $key + $customers->firstItem()}}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('customer.edit',$customer->id)}}"><i class="fas fa-pencil-alt"></i></a>
                                <a onclick="return confirm('Are you sure delete customer : {{ $customer->name }}')"
                                   class="btn btn-danger" href="{{route('customer.delete',$customer->id)}}"><i class="fas fa-trash"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <ul class="pagination justify-content-end">
                    <li class="page-item">{{ $customers->links("pagination::bootstrap-4") }}</li>
                </ul>


            </div>
        </div>
    </div>
@endsection


