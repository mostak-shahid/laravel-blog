@extends('layouts.app')
@section('content')
@include('admin.includes.errors')
            <div class="card">
                <div class="card-header">Create a new Post</div>
                <div class="card-body">
                	<form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                		{{csrf_field()}}
                		<div class="form-group">
	                		<label for="title">Title</label>
	                		<input name="title" type="text" class="form-control" id="title">
                		</div>
                		<div class="form-group">
                			<label for="category_id">Select a Category</label>
                			<select name="category_id" id="category_id" class="form-control">
                			@foreach($categories as $category)
                				<option value="{{$category->id}}">{{$category->name}}</option>
                			@endforeach
                			</select>
                		</div>
						<div class="form-group">
							<label for="featured">Featured Image</label>
							<input name="featured" type="file" class="form-control-file" id="featured">
						</div>
                        <div class="form-group">
                            <label>Select Tags</label>
                            <div class="form-check-inline-check">  
                            @foreach($tags as $tag)                              
                                <div class="form-check form-check-inline">
                                    <input name="tags[]" class="form-check-input" type="checkbox" id="inlineCheckbox{{$tag->id}}" value="{{$tag->id}}">
                                    <label class="form-check-label" for="inlineCheckbox{{$tag->id}}">{{$tag->tag}}</label>
                                </div>
                            @endforeach
                            </div>
                      </div>
                		<div class="form-group">
	                		<label for="content">Content</label>
	                		<textarea name="content" type="text" class="form-control" id="content"></textarea>
                		</div>
                		<button type="submit" class="btn btn-primary">Submit</button>
                	</form>
                </div>
            </div>
@endsection
@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>
<script>
jQuery(document).ready(function($){
    $('#content').summernote();
});
</script>
@endsection