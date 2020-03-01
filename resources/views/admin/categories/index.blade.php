@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Category name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td><a href="{{route('category.edit',['id'=>$category->id])}}" class="btn btn-sm btn-info">Edit</a></td>
                        <td><a href="{{route('category.destroy',['id'=>$category->id])}}" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection