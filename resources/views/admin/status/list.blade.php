@extends('layouts.core.home')
@section('page_title')
    Status List
@endsection
@section('content')
    <h1 class="mt-4">Users List</h1>

    <div class="card mb-4">
        <div class="card-header">
            <a href="}" class="btn btn-success float-right m-3">ADD STATUS</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th></th>

                        <th></th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($statuses as $key => $status)
                        <tr>
                            <td>{{ $status->name }}</td>
                            <td>
                                <a class="btn btn-primary" href=""><i class="fas fa-pencil-alt"></i></a>
                                <a onclick="return confirm('Are you sure delete user: {{ $status->name }}')"
                                   class="btn btn-danger" href=""><i class="fas fa-trash"></i></a>

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

