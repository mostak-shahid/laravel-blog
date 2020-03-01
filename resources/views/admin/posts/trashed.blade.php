@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Restore</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td><img class="img-fluid" src="{{ asset($post->featured) }}" alt="{{$post->title}}" width="50"></td>
                        <td>{{$post->title}}</td>
                        <td><a href="#" class="btn btn-sm btn-info">Restore</a></td>
                        <td><a href="{{route('post.remove',['id'=>$post->id])}}" class="btn btn-sm btn-danger">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection