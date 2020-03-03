@extends('layouts.app')
@section('content')
@include('admin.includes.errors')
            <div class="card">
                <div class="card-header">Edit Your Profile</div>
                <div class="card-body">
                	<form action="{{route('profile.update')}}" method="post">
                		{{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email" value="{{$user->email}}">
                        </div>
                		<div class="form-group">
	                		<label for="password">Password</label>
	                		<input name="password" type="password" class="form-control" id="password">
                		</div>
                        <div class="form-group">
                            <label for="avatar">Avatar</label>
                            <input name="avatar" type="file" class="form-control-file" id="avatar">
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input name="facebook" type="text" class="form-control" id="facebook" value="{{$user->profile->facebook}}">
                        </div>
                        <div class="form-group">
                            <label for="youtube">Youtube</label>
                            <input name="youtube" type="text" class="form-control" id="youtube" value="{{$user->profile->youtube}}">
                        </div>
                        <div class="form-group">
                            <label for="about">About</label>
                            <textarea name="about" id="about" class="form-control">{{$user->profile->about}}</textarea>
                        </div>
                		<button type="submit" class="btn btn-primary">Save</button>
                	</form>
                </div>
            </div>
@endsection