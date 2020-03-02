@extends('layouts.app')
@section('content')
@include('admin.includes.errors')
            <div class="card">
                <div class="card-header">Create a new User</div>
                <div class="card-body">
                	<form action="{{route('user.store')}}" method="post">
                		{{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input name="name" type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" type="email" class="form-control" id="email">
                        </div>
                		<div class="form-group">
	                		<label for="password">Password</label>
	                		<input name="password" type="password" class="form-control" id="password">
                		</div>
                		<button type="submit" class="btn btn-primary">Submit</button>
                	</form>
                </div>
            </div>
@endsection