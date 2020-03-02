@extends('layouts.app')
@section('content')
@include('admin.includes.errors')
            <div class="card">
                <div class="card-header">Update Post: {{$post->title}}</div>
                <div class="card-body">
                	<form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
                		{{csrf_field()}}
                		<div class="form-group">
	                		<label for="title">Title</label>
	                		<input name="title" type="text" class="form-control" id="title" value="{{$post->title}}">
                		</div>
                		<div class="form-group">
                			<label for="category_id">Select a Category</label>
                			<select name="category_id" id="category_id" class="form-control">
                			@foreach($categories as $category)
                				<option value="{{$category->id}}" @if($post->category_id == $category->id) selected @endif>{{$category->name}}</option>
                			@endforeach
                			</select>
                		</div>
						<div class="form-group">
							<label for="featured">Featured Image</label>
							<input name="featured" type="file" class="form-control-file" id="featured">
						</div>
                            @foreach($tags as $tag)                              
                                <div class="form-check form-check-inline">
                                    <input name="tags[]" class="form-check-input" type="checkbox" id="inlineCheckbox{{$tag->id}}" value="{{$tag->id}}"
                                    @foreach($post->tags as $selected_tag)
                                        @if($selected_tag->id == $tag->id)
                                        checked
                                        @endif
                                    @endforeach
                                    >
                                    <label class="form-check-label" for="inlineCheckbox{{$tag->id}}">{{$tag->tag}}</label>
                                </div>
                            @endforeach
                		<div class="form-group">
	                		<label for="content">Content</label>
	                		<textarea name="content" type="text" class="form-control" id="content">{{$post->content}}</textarea>
                		</div>
                		<button type="submit" class="btn btn-primary">Submit</button>
                	</form>
                </div>
            </div>
@endsection