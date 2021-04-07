@extends('layouts.core.home')
@section('page_title')
    Danh sach san pham
@endsection
@section('content')
    <h2 class="mt-4">Products List</h2>

    <div class="card mb-4">
        <div class="card-header">
            <a href="{{route('products.create')}}" class="btn btn-success float-right m-3">ADD PRODUCT</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Category ID</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Category ID</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($products as $key => $product)
                        <tr>
                            <td>{{ $key + $products->firstItem()}}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->type }}</td>
                            <td>{!! $product->description !!}</td>
                            <td><img src="{{ asset('storage/' . $product->img) }}" width="100" alt=""></td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>

                            <td>
                                <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}"><i class="fas fa-pencil-alt"></i></a>
                                <a onclick="return confirm('Are you sure delete products : {{ $product->name }}')"
                                   class="btn btn-danger" href="{{ route('products.delete', $product->id) }}"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <ul class="pagination justify-content-end">
                    <li class="page-item">{{ $products->links("pagination::bootstrap-4") }}</li>
                </ul>


            </div>
        </div>
    </div>
@endsection

