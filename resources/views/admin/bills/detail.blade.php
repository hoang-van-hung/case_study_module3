@extends('layouts.core.home')
@section('page_title')
    Bill Detail
@endsection
@section('content')
    <h1 class="mt-4">Bill Detail</h1>
    <div class="card mb-4">
        <div class="card-header">
            <a href="" class="btn btn-success float-right m-3">ADD BILL</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Customer</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Customer</th>
                        <th>Address</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($bills as $key => $bill)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $bill->product_name }}</td>
                            <td>{{ $bill->quantity }}</td>
                            <td>{{ $bill->price }}</td>
                            <td>{{ $bill->status_name }}</td>
                            <td>{{ $bill->customer_name }}</td>
                            <td>{{ $bill->address }}</td>
                            <td>{{ $bill->phone }}</td>
                            <td>{{ $bill->status_name }}</td>
                            <td>
                                <a class="btn btn-primary" href=""><i class="fas fa-pencil-alt"></i></a>
                                <a onclick="return confirm('Are you sure delete bill of {{ $bill->customer_name }}')"
                                   class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>



            </div>
        </div>
    </div>
@endsection




