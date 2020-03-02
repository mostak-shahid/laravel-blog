@extends('layouts.app')
@section('content')
@include('admin.includes.errors')
            <div class="card">
                <div class="card-header">Update Category: {{$tag->tag}}</div>
                <div class="card-body">
                	<form action="{{route('tag.update',['id'=>$tag->id])}}" method="post">
                		{{csrf_field()}}
                		<div class="form-group">
	                		<label for="tag">Name</label>
	                		<input name="tag" type="text" class="form-control" id="tag" value="{{$tag->tag}}">
                		</div>
                		<button type="submit" class="btn btn-primary">Update Category</button>
                	</form>
                </div>
            </div>
@endsection