@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tag name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                @if($tags->count()>0)
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{$tag->tag}}</td>
                            <td><a href="{{route('tag.edit',['id'=>$tag->id])}}" class="btn btn-sm btn-info">Edit</a></td>
                            <td><a href="{{route('tag.destroy',['id'=>$tag->id])}}" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                @else
                   <tr><td colspan="4" class="text-center">No Categories</td></tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection