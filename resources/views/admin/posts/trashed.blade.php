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
                @if($posts->count()>0)
                    @foreach($posts as $post)
                        <tr>
                            <td><img class="img-fluid" src="{{ asset($post->featured) }}" alt="{{$post->title}}" width="50"></td>
                            <td>{{$post->title}}</td>
                            <td><a href="{{route('post.restore',['id'=>$post->id])}}" class="btn btn-sm btn-info">Restore</a></td>
                            <td><a href="{{route('post.remove',['id'=>$post->id])}}" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                @else
                   <tr><td colspan="4" class="text-center">No trashed post</td></tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection