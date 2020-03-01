@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Edit</th>
                        <th>Trash</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><img class="img-fluid" src="{{ asset($post->featured) }}" alt="{{$post->title}}" width="50"></td>
                        <td>{{$post->title}}</td>
                        <td><a href="{{route('post.edit', ['id'=>$post->id])}}" class="btn btn-sm btn-info">Edit</a></td>
                        <td><a href="{{route('post.destroy', ['id'=>$post->id])}}" class="btn btn-sm btn-danger">Trash</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection