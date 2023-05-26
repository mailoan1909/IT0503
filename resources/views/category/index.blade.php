@extends('product.layout')
@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Tác vụ</th>
        </tr>
        @foreach ($categories as $value )
        <tr>
            <td>{{ $value->id }}</td>
            <td>{{ $value->name }}</td>
            <td>{{ $value->description }}</td>

            <td>
                <a href="{{asset('category/edit/'.$value->id)}}" class="btn btn-primary edit"><span class="glyphicon glyphicon-edit"> </span> Edit</a>
                <a href="{{asset('category/delete/'.$value->id)}}" onclick="return confirm('Bạn có chắc muốn xóa?')" class="btn btn-danger"><span class="glyphicon glyphicon-trash"> </span>Delete</a>
             </td>

        </tr>
        @endforeach
    </table>
@endsection
