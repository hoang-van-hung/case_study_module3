@extends('layouts.core.home')
@section('page_title')
    Bill List
@endsection
@section('content')
    <h1 class="mt-4">Bill List</h1>
    <div class="card mb-4">
        <div class="card-header">
            <a href="" class="btn btn-success float-right m-3">ADD CUSTOMER</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Id</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Date Pay</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Customer</th>
                        <th>Status</th>
                        <th>Date Pay</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($bills as $key => $bill)
                        <tr>
                            <td><a href="{{route('bill.detail',$bill->id)}}">MD-{{ $key + $bills->firstItem()}}</a></td>
                            <td>{{ $bill->customer_name }}</td>

                            <td>
                                <select class="custom-select" name="role" id="inputGroupSelect01">
                                    @foreach($statuses as $status)
                                        <option
                                                value="{{ $status->name }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>{{ $bill->date_pay }}</td>
                            <td>
                                <a class="btn btn-primary" href=""><i class="fas fa-pencil-alt"></i></a>
                                <a onclick="return confirm('Are you sure delete bill of {{ $bill->customer_name }}')"
                                   class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <ul class="pagination justify-content-end">
                    <li class="page-item">{{ $bills->links("pagination::bootstrap-4") }}</li>
                </ul>


            </div>
        </div>
    </div>
@endsection



