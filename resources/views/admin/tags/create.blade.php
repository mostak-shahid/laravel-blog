@extends('layouts.app')
@section('content')
@include('admin.includes.errors')
            <div class="card">
                <div class="card-header">Create a new Category</div>
                <div class="card-body">
                	<form action="{{route('tag.store')}}" method="post">
                		{{csrf_field()}}
                		<div class="form-group">
	                		<label for="tag">Tag</label>
	                		<input name="tag" type="text" class="form-control" id="tag">
                		</div>
                		<button type="submit" class="btn btn-primary">Submit</button>
                	</form>
                </div>
            </div>
@endsection