@extends('product.layout')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
        </div>
        <div class="pull-left">
            <a class="btn btn-success" href="{{ route('category.index') }}"> Management Category</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
<tr>
    <th>No</th>
    <th>Name</th>
    <th>Price</th>
    <th>Category</th>
    <th>Image</th>
    <th>Audio</th>
    <th width="280px">Action</th>
</tr>
@foreach($products as $key => $product)
<tr>
    <td>{{$key+1}}</td>
    <td>{{ $product->name }}</td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->category->name }}</td>
    <td><img src="{{ asset('image/'.$product->image) }}" alt="" border=3 height=150 width=200></td>
    <td><audio src="{{ asset('audio/'.$product->audio) }}" alt="" border=3 height=150 width=200></audio></td>

    <td>
        <form action="{{ route('products.destroy',$product->id) }}" method="POST">

            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>

            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>

            <a class="btn btn-primary" href="{{ route('products.destroy',$product->id) }}">Delete</a>

        </form>
    </td>
</tr>
@endforeach
</table>
@endsection
