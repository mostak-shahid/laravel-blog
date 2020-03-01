@extends('layouts.app')
@section('content')
@include('admin.includes.errors')
            <div class="card">
                <div class="card-header">Update Category: {{$category->name}}</div>
                <div class="card-body">
                	<form action="{{route('category.update',['id'=>$category->id])}}" method="post">
                		{{csrf_field()}}
                		<div class="form-group">
	                		<label for="name">Name</label>
	                		<input name="name" type="text" class="form-control" id="name" value="{{$category->name}}">
                		</div>
                		<button type="submit" class="btn btn-primary">Update Category</button>
                	</form>
                </div>
            </div>
@endsection