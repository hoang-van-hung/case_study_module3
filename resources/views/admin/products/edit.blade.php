@extends('layouts.core.home')
@section('page_title')
    Update thong tin san pham
@endsection
@section('content')
    {{--    @include('layouts.core.navbar')--}}

    <div class="card mt-2">
        <div class="card-header">
            Update Information
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $product->name }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Description</label>

                        <input type="text" name="description" class="form-control" value="{{ $product->description }}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col col-md-6" >
                        <label>Type</label>
                        <input type="text" name="type" class="form-control" value="{{ $product->type }}">
                    </div>
                    <div class="form-group col col-md-6">
                        <label>Category</label>
                        <select class="custom-select" name="category_id">
                            @foreach($categories as $category)
                                <option
                                    @if($category->id = $product->category_id)
                                    selected
                                    @endif
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" id="editor" cols="30" rows="6">{!!  $product->content !!}</textarea>
                </div>
                <div class="row">
                    <div class="form-group col col-md-3">
                        <label>Price</label>
                        <input type="text" name="price" class="form-control" value="{{ $product->price }}">
                    </div>
                    <div class="form-group col col-md-3">
                        <label>Image</label>
                        <input type="file" accept="image/*" onchange="loadFile(event)" name="image">
                    </div>
                    <div class="form-group col col-md-3">
                        <img id="output" style="height: 100px; width: 100px"/>
                    </div>
                    <div class="form-group col col-md-3">
                        <img src="{{ asset('storage/' . $product->img) }}" height="100px" width="100px">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>



